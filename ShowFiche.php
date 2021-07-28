<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowFiche extends Component
{

    public function render()
    {
        return view('livewire.show-fiche')
        ->extends('layouts.fiche');
    }

}
