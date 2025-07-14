<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Livewire\Admin\AddCandidate;
use App\Livewire\Admin\Candidate;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\EditCandidate;
use App\Livewire\Admin\EditElection;
use App\Livewire\Admin\EditParty;
use App\Livewire\Admin\Election as AdminElection;
use App\Livewire\Admin\ElectionDetails;
use App\Livewire\Admin\Parties;
use App\Livewire\Admin\Position;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Passwords\Confirm;
use App\Livewire\Auth\Passwords\Email;
use App\Livewire\Auth\Passwords\Reset;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\Verify;
use App\Livewire\ConfirmPvc;
use App\Livewire\Dashboard as LivewireDashboard;
use App\Livewire\ElectionResults;
use App\Livewire\Index as Homepage;
use App\Livewire\LiveResult;
use App\Livewire\VoteNow;
use App\Models\Election;
use App\Models\Party;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', Homepage::class)->name('home');


Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    Route::get('register', Register::class)
        ->name('register');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');
});




Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', LogoutController::class)
        ->name('logout');

    Route::get('vote/{id}', VoteNow::class)->name('vote');
    Route::get('/my-elections', LivewireDashboard::class)->name('my-elections');
});


Route::get('dashboard', Dashboard::class)->name('dashboard');
Route::get('verify-pvc', ConfirmPvc::class)->name('verify-pvc');
Route::get('live/{id}', LiveResult::class)->name('live');
Route::get('parties', Parties::class)->name('parties');
Route::get('election', AdminElection::class)->name('election');
Route::get('position/{id}', Position::class)->name('position');
Route::get('election-details/{id}', ElectionDetails::class)->name('election-details');
Route::get('candidates', Candidate::class)->name('candidates');
Route::get('add/{id}', AddCandidate::class)->name('add');
Route::get('edit-candidate/{id}', EditCandidate::class)->name('edit-candidate');
Route::get('edit-party/{id}', EditParty::class)->name('edit-party');
Route::get('edit-election/{id}', EditElection::class)->name('edit-election');
Route::get('results-record', ElectionResults::class)->name('results-record');

