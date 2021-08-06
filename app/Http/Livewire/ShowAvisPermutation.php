<?php

namespace App\Http\Livewire;

use App\Models\Agent;
use App\Models\AvisPermutation;
use App\Models\Dren;
use App\Models\Ecole;
use App\Models\Iep;
use App\Models\User;
use App\Pct\PctHelper;
use App\Pct\PdfHelper;
use App\Pct\PublicationManager;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ShowAvisPermutation extends Component
{
    use WithPagination;
    public $mode_search= 0;

    private $avis_permutations = [];
    //public ?AvisPermutation $avisPermutation;
    public $avis_id;
    public $ecole_id;
    public $iep_id;
    private $ieps = [];
    private $ecoles = [];
    public $dren_id;
    private $drens;
    public $mots_cles_libre;
    public $date_debut;
    public $date_fin;
    public $numero_avis_recherche_id;
    public $mots_cles_agent;


    public function setModeSearch($mode){
        $this->mode_search=$mode;
    }
    public function canReserve(){
        return PctHelper::currentIsAgent() && $this->canPublish() ;
    }

    public function any()
    {
        if (isset($this->avis_permutations)) {
            return count($this->avis_permutations);
        }
        return 0;
    }

    public function canPublish(){
        return PctHelper::canPublish();
    }

    public function isRegistered()
    {
        return PctHelper::currentIsAgent();
    }
    public function canGetByLibre(){
        return !empty($this->mots_cles_libre);
    }
    public function canGetByDate(){
        return !empty($this->date_debut) &&
        !empty($this->date_fin) && $this->date_fin>$this->date_debut;
    }

    public function canGetByNumeroAvis(){
        return !empty($this->numero_avis_recherche_id);
    }
    public function canGetByAgent(){
        return !empty($this->mots_cles_agent);
    }
    public function canGetByDren()
    {
        return !empty($this->dren_id);
    }
    public function canGetByIep(){
        return !empty($this->iep_id);
    }
    public function canGetByEcole(){
        return !empty($this->ecole_id);
    }

    public function show_avis_by_date()
    {

        $agent = PctHelper::getCurentAgent();
        $this->avis_permutations =
        PctHelper::getPlacesDisponibleDate($agent,$this->date_debut,$this->date_fin);
    }

    public function show_avis_by_id()
    {
        $agent = PctHelper::getCurentAgent();
        $this->avis_permutations = PctHelper::getPlacesDisponibleNumAvis($agent,$this->numero_avis_recherche_id);
    }
    public function show_avis_by_agent()
    {
        $agent = PctHelper::getCurentAgent();
        $this->avis_permutations =
         PctHelper::getPlacesDisponibleInfosAgent($agent,$this->mots_cles_agent);
    }
    public function publier ()
    {
        redirect()->route('post-publications');
    }

    public function show_avis_all()
    {
        $agent = PctHelper::getCurentAgent();
        $this->avis_permutations = PctHelper:: getPlacesDisponibles($agent);
    }
    public function show_avis_dren()
    {
        $agent = PctHelper::getCurentAgent();
        $this->avis_permutations = PctHelper:: getPlacesDisponibleDren($agent,$this->dren_id);
    }
    public function show_avis_iep()
    {
        $agent = PctHelper::getCurentAgent();
        $this->avis_permutations =PctHelper::getPlacesDisponibleIep($agent,$this->iep_id);

    }
    public function show_avis_ecole()
    {
        $agent = PctHelper::getCurentAgent();
        $this->avis_permutations = PctHelper::getPlacesDisponibleEcole($agent,$this->ecole_id);
    }

    public function supprimer_avis($avis_id)
    {
        $manager = new PublicationManager($avis_id);
        $manager->supprimer();
    }

    public function reserver_avis($avis_id)
    {
        $manager = new PublicationManager($avis_id);
        $manager->reserver();
    }
    public function canPrintListeAdmis(){

        $r = AvisPermutation::where('etat','=',AvisPermutation::valide())->get()->count();

        return $r>0;
    }
    public function imprimer_acte_permutation($avis_id)
    {

        redirect()->route('acte-permutation',['id'=>$avis_id]);
    }
    public function imprimer_liste_admis()
    {
        $localisation='all';
        $id=0;

        switch ($this->mode_search)
        {
            case 1:
                $localisation='dren';
                $id=$this->dren_id;
            break;
            case 2:
                $localisation='iep';
                $id=$this->iep_id;
            break;
            case 3:
                $localisation='ecole';
                $id=$this->ecole_id;
            break;
            default:$localisation ='all';break;
        }
        redirect()->route('liste-permutation',['localite'=>$localisation,'id'=>$id]);
    }
    public function valider_avis($avis_id)
    {
        $manager = new PublicationManager($avis_id);
        $manager->valider();
    }

    public function annuler_validation($avis_id)
    {
        $manager = new PublicationManager($avis_id);
        $manager->annulerValidation();
    }
    public function publier_avis($ecole_id)
    {
        $manager = new PublicationManager();
        $manager->publier($ecole_id);
    }

    public function refreshData()
    {

        switch ($this->mode_search)
        {
            case 1:$this->show_avis_dren($this->dren_id);break;
            case 2:$this->show_avis_iep($this->iep_id);break;
            case 3:$this->show_avis_ecole($this->ecole_id);break;
            case 4:$this->show_avis_by_id($this->numero_avis_recherche_id);break;
            case 5:$this->show_avis_by_agent($this->mots_cles_agent);break;
            case 6:$this->show_avis_by_date($this->date_debut,$this->date_fin);break;
            default:$this->show_avis_all();break;
        }
        $this->drens = Dren::orderBy('nom')->get();
        if (!empty($this->dren_id)) {


            $this->ieps = Iep::where('dren_id', $this->dren_id)->orderBy('nom')->get();
            if (!empty($this->iep_id)) {


                $this->ecoles = Ecole::where('iep_id', $this->iep_id)->orderBy('nom')->with('iep.dren')->get();
                if (!empty($this->ecole_id)) {

                }
            }
        }
    }

    public function mount(){
        if(!$this->canPublish()){
            route('publications');
        }

        $this->show_avis_all();
    }
    public function render()
    {

        $this->refreshData();
        return view('livewire.show-avis-permutation',
            [
                'avis_permutations' => $this->avis_permutations, 'ecoles' => $this->ecoles,
                'ieps' => $this->ieps, 'drens' => $this->drens
            ]
        );
    }
}
