<?php
use App\Http\Livewire\Crud\ShowDiscipline;
use App\Http\Livewire\Crud\ShowDren;
use App\Http\Livewire\Crud\ShowEmploi;
use App\Http\Livewire\Crud\ShowFonction;
use App\Http\Livewire\Crud\ShowParametre;
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


Route::middleware(['auth:sanctum', 'verified'])->group(function(){

    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');

    Route::get('/parametres', ShowParametre::class)->name('parametres');
    Route::get('/drens', ShowDren::class)->name('drens');
    Route::get('/emplois', ShowEmploi::class)->name('emplois');
    Route::get('/fonctions', ShowFonction::class)->name('fonctions');
    Route::get('/disciplines', ShowDiscipline::class)->name('disciplines');
});
