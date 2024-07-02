<?php

namespace App\Livewire\Admin;

use App\Models\Department;
use App\Models\Election;
use App\Models\Faculty;
use App\Models\Party;
use App\Models\State;
use App\Models\Lga;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard')->with([
            'elections' => Election::count(),
            'parties' => Party::count(),
            'states' => Faculty::count(),
            'users' => User::count(),
            'lga' => Department::count(),
        ]);
    }
}
