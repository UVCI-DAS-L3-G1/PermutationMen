<?php

namespace App\Http\Livewire;

use App\Models\AvisPermutation;
use App\Pct\Admis;
use App\Pct\AppConfig;
use App\Pct\PctHelper;
use App\Pct\PdfHelper;
use Livewire\Component;



class ShowAdmisListe extends Component
{
    private $avis_admis = [];
    private $avis_permutations = [];
    public $localite;
    public $localite_id;
    public function anyItems(){

        return !empty($this->avis_admis);
    }
    public function canPrintListeAdmis(){

        $r = AvisPermutation::where('etat','=',AvisPermutation::valide())->get()->count();

        return $r>0;
    }

    public function imprimer_acte_permutation($avis_id)
    {

        if($avis_id==0){
            redirect()->route('actes-permutations',['localite'=>$this->localite,'id'=>$this->localite_id]);
        }else{
            redirect()->route('acte-permutation',['id'=>$avis_id]);
        }
        
    }
    public function imprimer_liste_admis()
    {

        redirect()->route('liste-permutation',['localite'=>$this->localite,'id'=>$this->localite_id]);

    }

    public function loadData(){
        $this->avis_permutations =PctHelper::genereListePermutationQuery($this->localite,$this->localite_id)->paginate(AppConfig::pagination());

        $this->avis_admis =PctHelper::genereListePermutationAdmis($this->avis_permutations);

    }

    public function mount($localite,$id){
        $this->localite = $localite;
        $this->localite_id=$id;
        $this->loadData();


    }

    public function render()
    {
        $this->loadData();
        return view('livewire.show-admis-liste',['avis_admis'=>$this->avis_admis,'avis_permutations'=>$this->avis_permutations]);
    }
}
