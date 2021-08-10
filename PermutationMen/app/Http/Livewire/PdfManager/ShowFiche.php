<?php

namespace App\Http\Livewire\PdfManager;

use Livewire\Component;
use app\Models\User;
use app\Models\AvisPermutation;

class ShowFiche extends Component
{

    public function mount(AvisPermutation $avis)
    {
        $this->avis = $avis;
    }

    public function render()
    {
        return view('livewire.PdfManager.show-fiche', ['avis' => $avis])->extends('layouts.pdf');
    }

}
