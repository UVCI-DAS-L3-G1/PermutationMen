<?php

namespace App\Http\Controllers;

use App\Pct\PdfHelper;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function getFicheDemande($id){
        return PdfHelper::genereFichePermutation($id);
    }
    public function getActePermutation($id){
        return PdfHelper::genereActePermutation($id);
    }
    public function getListePermutation($localite,$id){
        return PdfHelper::genereListePermutation($localite,$id);
    }
}
