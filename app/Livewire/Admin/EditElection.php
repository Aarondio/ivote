<?php

namespace App\Livewire\Admin;

use App\Models\Election;
use Filament\Notifications\Notification;
use Livewire\Component;
use Livewire\Attributes\Url;

class EditElection extends Component
{
    #[Url]
    public $id;

    public $election;
    public $name;
    protected $start_date;
    protected  $end_date;

    public function mount()
    {
        $this->election = Election::findOrFail($this->id);
        $this->name = $this->election->name;
        $this->start_date = $this->election->start_date;
        $this->end_date = $this->election->end_date;
    }

    public function render()
    {
        return view('livewire.admin.edit-election')->with([
            'election' => $this->election
        ]);
    }

    public function store()
    {
        $this->election->update($this->only([
            'name',
            //   'start_date',
            //   'end_date'
        ]));

        Notification::make()
            ->success()
            ->title("Election has been updated")
            ->send();
        $this->redirectRoute('election');
    }
}
