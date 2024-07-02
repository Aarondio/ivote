<?php

namespace App\Livewire\Admin;

use App\Models\Election as ModelsElection;
use Livewire\Component;

class Candidate extends Component
{
    public function render()
    {
        return view('livewire.admin.candidate')->with([
            'elections' => ModelsElection::whereDate('end_date', '>=' ,date("Y-m-d"))->get()
        ]);
    }
}
