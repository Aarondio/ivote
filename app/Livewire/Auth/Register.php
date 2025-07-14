<?php

namespace App\Livewire\Auth;

use App\Models\Department;
use App\Models\Faculty;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.auth')]
class Register extends Component
{
    /** @var string */
    public $name = '';

    /** @var string */
    public $email = '';

    /** @var string */
    public $password = '';

    /** @var string */
    public $passwordConfirmation = '';

    public $faculties;
    public $departments;
    public $faculty_id = "";
    public $department_id = "";

    public function boot()
    {
        $this->faculties = Faculty::all();
        $this->departments = collect();
    }

    public function updated()
    {
        $this->departments = Department::where('faculty_id', $this->faculty_id)->get();
    }


    public function messages()
    {
        return [
            'faculty_id' => 'Faculty cannot be empty',
            'department_id' => 'Department cannot be empty',
        ];
    }
    public function register()
    {
        $this->validate([
            'name' => ['required'],
            'department_id' => ['required'],
            'faculty_id' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8', 'same:passwordConfirmation'],
        ]);
 
        
        $user = User::create([
            'email' => $this->email,
            'department_id' => $this->department_id,
            'faculty_id' => $this->faculty_id,
            'name' => $this->name,
            'password' => Hash::make($this->password),
        ]);

        event(new Registered($user));

        Auth::login($user, true);

        return redirect()->intended(route('home'));
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
