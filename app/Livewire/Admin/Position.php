<?php

namespace App\Livewire\Admin;

use App\Models\Election as ModelElection;
use App\Models\Position as CandidatePosition;
use Filament\Notifications\Notification;
use Livewire\Attributes\Url;
use Livewire\Component;

class Position extends Component
{
    #[Url(keep:true)]
    public $id;

    public $name = "";
    public $election;

    public function mount($id)
    {
        $this->id = $id;
        $this->election = ModelElection::find($this->id);
    }

    public function render()
    {
        return view('livewire.admin.position')->with([
            'election' => $this->election,
            'positions' => CandidatePosition::where('election_id', $this->id)->get(),
        ]);
    }

    public function rules()
    {
        return [
            'name' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Select the position to be added'
        ];
    }

    public function store()
    {
        $this->validate();
        $position = new CandidatePosition();
        $position->name = $this->name;
        $position->election_id = $this->id;

        $existingPosition = CandidatePosition::where('name', $this->name)
            ->where('election_id', $this->id)
            ->first();
            
        if ($existingPosition) {
            session()->flash('error', '<span class="capitalize">' . $this->name . '</span> position has already been created');
            return redirect()->route('position', ['id' => $this->id]);
        } else {
            $position->save();
            $this->reset();

            // dd($position);
           
            if($position){
                $el_id = $position->election_id;
                Notification::make()
                ->title('Position created successfully')
                ->success()
                ->send();
                return redirect()->route('position', ['id' => $el_id])->with(['election' => $this->election]);
            }

        }
    }
}
