<?php

namespace App\Livewire\Admin;

use App\Models\Election;
use App\Models\Candidate;
use App\Models\Party;
use App\Models\Position;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class EditCandidate extends Component
{
    use WithFileUploads;

    #[Url] 
    public $id;
    public Candidate $candidate;
    public Election $election;
    public $name;
    public $image;
    public $party_id;
    public $position_id;
    public $notable_achievement;


    public function mount(){
       $this->candidate = Candidate::findOrFail($this->id);
       $this->election = Election::find($this->candidate->election_id);
       $this->name = $this->candidate->name;
       $this->image = $this->candidate->image;
       $this->notable_achievement = $this->candidate->notable_achievement;
    }
    public function render()
    {
        return view('livewire.admin.edit-candidate')->with([
            'candidate' => $this->candidate,
            'election'=> $this->election,
            'parties'=> Party::all(),
            'positions'=> Position::where('election_id',$this->election->id)->get(),
        ]);
    }

    public function update(){
        $this->candidate->update($this->only([
            'image',
            'name',
            'party_id',
            'position_id',
            'notable_achievement'
        ]));
    }
}
