<?php

namespace App\Livewire\Admin;

use App\Models\Party;
use Filament\Notifications\Notification;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Parties extends Component
{
    use WithFileUploads;
    
    public $name = "";
    public $acronym = "";
    public $logo;
    public $details = "";
    public $website = "https://www.";
    public ?Party $party;

    public function render()
    {
        return view('livewire.admin.parties')->with([
            'parties'=>Party::where('active',1)->orderBy('name','ASC')->get()
        ]);
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                Rule::unique('parties'),
            ],
            'acronym' => 'required|min:2|max:6',
            'details' => 'required|min:2|max:256',
            'website' => 'required|url|min:5',
        ];
    }

    public function store()
    {
        $this->validate();

        // $this->logo->storeAs(path: 'public', name: $this->name);
        // $this->logo->store(path: 'images');
        $name = $this->logo->getClientOriginalName();
        $this->logo = $this->logo->storeAs('images', $name,'public');

        Party::create($this->only([
            'name',
            'details',
            'logo',
            'acronym',
            'website',
        ]));

        $this->reset();
        Notification::make()
            ->title('Party created successfully')
            ->success()
            ->send();
        return redirect()->back();
    
    }

    public function destroy($id){
        Party::destroy($id);
    }
}
