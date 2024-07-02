<?php

namespace App\Livewire;

use App\Models\Election;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.user')]
class ElectionResults extends Component
{
    public function render()
    {
        return view('livewire.election-results')->with([
            'elections' => Election::orderBy('end_date', 'ASC')->get(),
        ]);
    }
}
