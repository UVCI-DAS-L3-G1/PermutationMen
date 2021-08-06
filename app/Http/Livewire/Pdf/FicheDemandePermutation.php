<?php

namespace App\Http\Livewire\Pdf;

use App\Models\AvisPermutation;
use Illuminate\Support\Facades\Log;
use Livewire\Component;


class FicheDemandePermutation extends Component
{

    public $avis;
    public function render()
    {


        return view('livewire.pdf.fiche-demande-permutation',['avis',$this->avis]);


    }
}
