<?php

namespace App\Livewire\Admin;

use App\Models\Candidate;
use App\Models\Election;
use App\Models\Party;
use App\Models\Position;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\URL;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class AddCandidate extends Component
{
    use WithFileUploads;

    #[URL(keep: true)]
    public $id;

    public $name = "";
    public $election_id;
    public $party_id = "";
    public $image;
    public $notable_achievement = "";
    public $position_id = "";


    public function mount($id)
    {
        $this->election_id = $id;
    }

    public function render()
    {
        return view('livewire.admin.add-candidate')->with([
            'election' => Election::find($this->id),
            'parties' => Party::where('active', 1)->orderBy('name', 'ASC')->get(),
            'positions' => Position::where('election_id', $this->id)->get(),
        ]);
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'election_id' => 'required',
            'party_id' => 'required',
            'notable_achievement' => 'required',
            'position_id' => 'required',
            'image' => 'nullable|image|max:1024',
        ];
    }



    public function store()
    {
        $this->validate();
        // $name = $this->image->getClientOriginalName();
        // $this->image = $this->image->storeAs('images', $name, 'public');
        if ($this->image) {
            $name = $this->image->getClientOriginalName();
            $this->image = $this->image->storeAs('images', $name, 'public');
            // $position->image = $path;
        }

        $existingCandidate = Candidate::where('election_id', $this->election_id)
            ->where('position_id', $this->position_id)
            ->where('party_id', $this->party_id)
            ->first();

        if ($existingCandidate) {
            session()->flash('error', 'A party cannot have two candidates running for the same position');

            return redirect()->route('add', $this->id);
            $this->reset();

            // return redirect()->back();
        } else {
            Candidate::create($this->only([
                'name',
                'election_id',
                'party_id',
                'image',
                'notable_achievement',
                'position_id',
            ]));

            Notification::make()
                ->title('Candidate has been created successfully')
                ->success()
                ->send();

            return redirect()->route('election-details', $this->id);
        }
    }
}
