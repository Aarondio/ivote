<?php

namespace App\Livewire\Admin;

use App\Models\Department;
use App\Models\Election as ModelsElection;
use App\Models\Faculty;
use App\Models\Lga;
use App\Models\State;
use Filament\Notifications\Notification;
use Livewire\Component;

class Election extends Component
{
    public $name = "";
    public $start_date = "";
    public  $end_date = "";
    public  $election_type = "";
    // public $all = "";

    public $states;
    public $lgas;
    public $faculty_id = "";
    public $department_id = "";

    public function boot()
    {
        $this->states = Faculty::all();
        $this->lgas = collect();
    }

    public function updated()
    {
        if ($this->election_type == 'national') {
            $this->faculty_id = "";
            $this->department_id = "";
        } else {
            $this->lgas = Department::where('faculty_id', $this->faculty_id)->get();
        }
    }

    public function resetFaculty()
    {
        $this->faculty_id = "";
    }

    public function render()
    {
        return view('livewire.admin.election')->with([
            'elections' => ModelsElection::whereDate('end_date', '>=', date("Y-m-d"))->get(),
            // 'states' => State::all(),
        ]);
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'election_type' => 'required',

            'start_date' => [
                'required',
                'date',
                'after_or_equal:today',
            ],
            'end_date' => [
                'required',
                'date',
                'after_or_equal:today',
            ],
            'faculty_id' => 'nullable',
            'department_id' => 'nullable',
        ];
    }

    public function store()
    {
        $this->validate();

        if (empty($this->faculty_id)) {
            $this->faculty_id = 0;
            $this->department_id = 0;
        }

        ModelsElection::create($this->only([
            'name',
            'election_type',
            'faculty_id',
            'department_id',
            'end_date',
            'start_date',
        ]));


        Notification::make()
            ->title('Election created successfully')
            ->success()
            ->send();
        $this->reset();
        // return redirect()->back();
        $this->redirectRoute('election', navigate: true);
    }

    public function destroy($id){
        ModelsElection::destroy($id);
    }
}
