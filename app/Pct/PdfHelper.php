<?php

namespace   App\Pct;

use App\Http\Livewire\Pdf\FicheDemandePermutation;
use App\Models\Agent;
use App\Models\AvisPermutation;
use App\Models\Ecole;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class PdfHelper
{
    public static function genereFichePermutation($id)
    {
        $avis = AvisPermutation::findOrFail($id);
        $html = view('livewire.pdf.fiche-demande-permutation', ['avis' => $avis])->render();
        return self::getPdf($html);
    }
    public static function genereActePermutation($id)
    {
        $avis = AvisPermutation::findOrFail($id);
        $html = view('livewire.pdf.acte-permutation', ['avis' => $avis])->render();
        return self::getPdf($html);
    }
    public static function genereListePermutation($location,$id)
    {
        $avis =[];
        $q='';
        $query=AvisPermutation::query()
        ->select("avis_permutations.*")
        ->join('agents', 'avis_permutations.agent_demandeur_id', '=', 'agents.id')
        ->join('users', 'agents.id', '=', 'users.id')
        ->join('ecoles', 'agents.ecole_id', '=', 'ecoles.id')
        ->join('ieps', 'ecoles.iep_id', '=', 'ieps.id')
        ->join('drens', 'ieps.dren_id', '=', 'drens.id')
        ->where('etat',AvisPermutation::valide());

        switch ($location)
        {
            case 'dren':
            $q = $query->where('drens.id',$id);
            break;
            case 'iep':
                $q = $query->where('ieps.id',$id);
            break;
            case 'ecole':
                $q = $query->where('ecoles.id',$id);
            break;
            default: $q = $query;break;
        }
        $avis = $q->get();
        $html = view('livewire.pdf.liste-definitive-permutation', ['avis' => $avis])->render();
        return self::getPdf($html);
    }
    private static function getPdf($html)
    {

        $pdf = \App::make('snappy.pdf.wrapper');
        $pdf->loadHTML($html);
        return $pdf->inline();
    }
}
