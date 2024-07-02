<?php

namespace App\Livewire\Admin;

use App\Models\Party;
use Filament\Notifications\Notification;
use Livewire\Attributes\Url;
use Livewire\Component;

class EditParty extends Component
{
    #[Url]
    public $id;

    public $name;
    public $acronym;
    public $details;
    public $website;

    public $party;

    public function mount()
    {
        $this->party = Party::findOrFail($this->id);
        $this->name = $this->party->name;
        $this->acronym = $this->party->acronym;
        $this->details = $this->party->details;
        $this->website = $this->party->website;
    }
    public function render()
    {
        return view('livewire.admin.edit-party')->with([
            'party' => $this->party,
        ]);
    }

    public function updatePart()
    {
        $this->party->update($this->only([
            'name',
            'acronym',
            'details',
            'website',
        ]));


        Notification::make()
            ->success()
            ->title('Party was updated successfully')
            ->send();
    }
}
