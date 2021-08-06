<?php

namespace   App\Pct;

use App\Http\Livewire\Pdf\FicheDemandePermutation;
use App\Models\Agent;
use App\Models\AvisPermutation;
use App\Models\Ecole;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class PdfHelper
{
    private static function getActePermutation($avis )
    {

        $html = view('livewire.pdf.acte-permutation', ['avis' => $avis])->render();
        return self::getPdf($html);
    }
    public static function genereActePermutationZip($location, $id)
    {

        $files=[];
        $avis = PctHelper::getResultatPermutations($location, $id);
        $zip = new ZipArchive();
        Storage::disk('local')->makeDirectory('pdfs',$mode=0775);
        Storage::disk('local')->makeDirectory('zips',$mode=0775);

        $zip_name = rand(100000000, 999999999) . '.zip';
        $zip_file_path = storage_path('app/zips/'.$zip_name);

        $zip->open($zip_file_path, ZipArchive::CREATE);

        foreach ($avis as $key=>$avi) {
            $file_name = rand(100000000, 999999999).$key.'.pdf';
            $file_path=storage_path('app/pdfs/'.$file_name);
            self::getActePermutation($avi)->save($file_path);
            $zip->addFile($file_path,$file_name);
            array_push($files,$file_name);

        }
        $zip->close();
        foreach($files as $file){
            Storage::delete('pdfs/'.$file);
        }

        $header = ['Content-Type:application/zip',
                   'Content-Disposition:attachment;filename='.$zip_name,
                   'Content-Description= File Transfer',
                   'Content-Transfer-Encoding:binary']
                   ;

        if (file_exists($zip_file_path)) {

            return response()->download($zip_file_path, $zip_name, $header)
            ->deleteFileAfterSend();
        }

    }
    public static function genereActePermutation($id)
    {

        $avis = AvisPermutation::findOrFail($id);
        return self::getActePermutation($avis)->inline();
    }

    public static function genereFichePermutation($id)
    {
        $avis = AvisPermutation::findOrFail($id);
        if($avis->agentDemandeur->id==Auth::user()->id ||
        $avis->agentFavorable->id==Auth::user()->id){
            $html = view('livewire.pdf.fiche-demande-permutation', ['avis' => $avis])->render();
        //return self::getPdf($html)->inline();
        return $html;
        }
        return response('<b>Aucune fiche disponibe</b>',404);

    }

    public static function genereListePermutation($location, $id)
    {

        $avis = PctHelper::genereListePermutationQuery($location, $id)->get();
        $admis =PctHelper::genereListePermutationAdmis($avis);
        $html = view('livewire.pdf.liste-definitive-permutation', ['avis_admis' => $admis])->render();
        return self::getPdf($html)->inline();
    }
    private static function getPdf($html, $size = 'a4', $marginBottom = '0', $orientation = 'portrait')
    {

        $pdf = \App::make('snappy.pdf.wrapper');
        $pdf->loadHTML($html)->setPaper($size)->setOrientation($orientation)
            ->setOption('margin-bottom', $marginBottom);
        return $pdf;
    }
}
