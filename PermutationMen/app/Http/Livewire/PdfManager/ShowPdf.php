<?php

namespace App\Http\Livewire\PdfManager;

use Livewire\Component;
use App;

class ShowPdf extends Component
{
    public function render()
    {
        return view('livewire.PdfManager.show-pdf')->extends('layouts.pdf');
    }
}
