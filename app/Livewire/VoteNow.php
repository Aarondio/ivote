<?php

namespace App\Livewire;

use App\Models\Candidate;
use App\Models\Election;
use App\Models\Vote;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;

#[Layout('components.layouts.user')]
class VoteNow extends Component
{
    #[Url]
    public $id;

    public $candidate_id = "";
    public $election_id;
    public $user_id;

    public function mount()
    {
        $this->user_id = Auth::id();
        $this->election_id = Election::find($this->id)->id;
    }

    public function render()
    {
        

        return view('livewire.vote-now')->with([
            'election' => Election::where('id', $this->id)->first(),
            'vote'=>Vote::where('user_id',$this->user_id)->where('election_id',$this->id)->first(),
            'candidates' => Candidate::where('election_id', $this->id)->orderBy('party_id', 'ASC')->get(),
        ]);
    }

    public function vote()
    {

        Vote::create($this->only([
            'user_id',
            'candidate_id',
            'election_id',
        ]));

        Notification::make()
            ->title("Your vote has been submitted successfully")
            ->success()
            ->send();
        // dd($this->user_id, $this->election_id, $this->candidate_id);
    }
}
