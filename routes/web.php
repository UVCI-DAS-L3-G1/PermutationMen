<?php

use App\Http\Controllers\PdfController;
use App\Http\Livewire\Crud\ShowDiscipline;
use App\Http\Livewire\Crud\ShowDren;
use App\Http\Livewire\Crud\ShowEcole;
use App\Http\Livewire\Crud\ShowEmploi;
use App\Http\Livewire\Crud\ShowFonction;
use App\Http\Livewire\Crud\ShowIep;
use App\Http\Livewire\Crud\ShowParametre;
use App\Http\Livewire\Pdf\FicheDemandePermutation;
use App\Http\Livewire\PostPublication;
use App\Http\Livewire\RegisterAgent;
use App\Http\Livewire\ShowMyDashboard;
use App\Http\Livewire\ShowAvisPermutation;
use App\Http\Livewire\ShowProfile;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified', 'registration_completed'])->group(function () {
    Route::get('/dashboard', ShowMyDashboard::class)->name('my_dashboard');
    Route::get('/publications', ShowAvisPermutation::class)->name('publications');
    Route::get('/post-publications', PostPublication::class)->name('post-publications')
    ->middleware('canPublish');
    Route::get('/show-profile/{id}', ShowProfile::class)->name('show-profile');
    Route::get('/fiche-demande/{id}', [PdfController::class,'getFicheDemande'])->name('fiche-demande');
    Route::get('/acte-permutation/{id}', [PdfController::class,'getActePermutation'])->name('acte-permutation');
    Route::get('/liste-permutation/{localite}/{id}',
    [PdfController::class,'getListePermutation'])
    ->where('localite','(dren|iep|ecole|all)')
    ->whereNumber('id')
    ->name('liste-permutation');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/parametres', ShowParametre::class)->name('parametres');
    Route::get('/drens', ShowDren::class)->name('drens');
    Route::get('/emplois', ShowEmploi::class)->name('emplois');
    Route::get('/fonctions', ShowFonction::class)->name('fonctions');
    Route::get('/disciplines', ShowDiscipline::class)->name('disciplines');
    Route::get('/ieps', ShowIep::class)->name('ieps');
    Route::get('/ecoles', ShowEcole::class)->name('ecoles');
    Route::get('/complete-registration', RegisterAgent::class)->name('complete-registration');

});
