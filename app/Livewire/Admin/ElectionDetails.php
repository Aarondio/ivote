<?php

namespace App\Livewire\Admin;

use App\Models\Candidate;
use App\Models\Election;
use App\Models\Position;
use Livewire\Attributes\Url;
use Livewire\Component;

class ElectionDetails extends Component
{
    #[Url]
    public $id;

    public function render()
    {
        return view('livewire.admin.election-details')->with([ 
            'election'=> Election::find($this->id),
            'positions'=> Position::where('election_id', $this->id)->get(),
            'candidates'=> Candidate::where('election_id', $this->id)->orderBy('party_id','ASC')->get(),
        ]);
    }
}
