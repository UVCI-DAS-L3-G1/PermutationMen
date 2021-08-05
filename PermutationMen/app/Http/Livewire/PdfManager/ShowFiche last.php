<?php

namespace App\Http\Livewire\PdfManager;

use Livewire\Component;
use app\Models\User;
use app\Models\AvisPermutation;
use app\Models\Agent;
use app\Models\Discipline;
use app\Models\Dren;
use app\Models\Ecole;
use app\Models\Emploi;
use app\Models\Fonction;
use app\Models\Iep;
use app\Models\Parametre;

class ShowFiche extends Component
{
    public function render()
    {
        return view('livewire.PdfManager.show-fiche')->extends('layouts.fiche');
    }

}
