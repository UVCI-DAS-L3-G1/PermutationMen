<?php

namespace App\Http\Livewire;

use App\Pct\PctHelper;
use App\Pct\PublicationManager;
use Livewire\Component;
use Livewire\WithPagination;

class ShowMyPublication extends Component
{
    use WithPagination;
    private $avis_permutations =[];
    public $avis_id;
    public $isModalOpen=0;
    public function anyItems(){
        return count($this->avis_permutations)>0;
    }
    public function canPublish(){
        return PctHelper::canPublish();
    }
    public function publier ()
    {
        redirect()->route('post-publications');
    }
    public function isRegistered()
    {
        return PctHelper::currentIsAgent();
    }
    public function confirmer_avis($avis_id)
    {
        $manager = new PublicationManager($avis_id);
        $manager->confirmer();
    }
    public function annuler_confirmation($avis_id)
    {
        $manager = new PublicationManager($avis_id);
        $manager->annulerConfirmation();
    }
    public function supprimer_avis($avis_id)
    {
        $manager = new PublicationManager($avis_id);
        $manager->supprimer();
    }
    public function imprimer_fiche_permutation($avis_id)
    {
        $manager = new PublicationManager($avis_id);
        $manager->imprimer();
    }
    public function refreshData()
    {
        $agent = PctHelper::getCurentAgent();
        $this->avis_permutations = PctHelper::getAgentPublications($agent);

    }

    public function render()
    {
        $this->refreshData();
        return view('livewire.show-my-publication',['avis_permutations'=>$this->avis_permutations]);
    }
}
