<?php

namespace App\Livewire;

use App\Models\Candidate;
use App\Models\Election;
use App\Models\Vote;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;

#[Layout('components.layouts.user')]
class LiveResult extends Component
{
    #[Url]
    public $id;
    public Election $election;
    public $candidates;
    public $votes;
    public $winner;

    public function mount()
    {
        $this->election = Election::findOrFail($this->id);
        $this->candidates = Candidate::where('election_id', $this->election->id)->get();
        $this->votes = Vote::where('election_id', $this->election->id)->get();

        if (Carbon::parse($this->election->end_date)->isPast()) {
            $this->winner = $this->votes->groupBy('candidate_id')->sortByDesc(function ($group) {
                return $group->count();
            })->first()->first()->candidate;
        }
    }

    public function render()
    {
        return view('livewire.live-result')->with([
            'election' => $this->election,
        ]);
    }

    // public function with(){
    //     return [
    //         'election'=> Election::findOrFail($this->id),
    //     ];
    // }
}
