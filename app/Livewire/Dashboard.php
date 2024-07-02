<?php

namespace App\Livewire;

use App\Models\Election;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.user')]
class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboard')->with([
            'locals'=>Election::where('department_id', Auth::user()->department_id)->whereDate('end_date','>',today())->get(),
            'states'=>Election::where('faculty_id', Auth::user()->faculty_id)->where('department_id',0)->whereDate('end_date','>',today())->get(),
            'nationals'=>Election::where('election_type','national')->whereDate('end_date','>',today())->get(),
        ]);
    }

    // $this->elections = Election::whereDate('start_date', Carbon::today())
    // ->where('end_date', '>', Carbon::today())
    // ->get();
}
