<?php

namespace App\Http\Livewire\PdfManager;

use Livewire\Component;
use app\Models\User;

class ShowFiche extends Component
{

    public function render()
    {
        return view('livewire.PdfManager.show-fiche')->extends('layouts.fiche');
    }

}
