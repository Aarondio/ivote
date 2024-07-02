<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.user')]
class ConfirmPvc extends Component
{
    public function render()
    {
        return view('livewire.confirm-pvc');
    }
}
