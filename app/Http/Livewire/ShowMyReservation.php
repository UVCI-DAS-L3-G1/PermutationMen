<?php

namespace App\Http\Livewire;

use App\Pct\PctHelper;
use App\Pct\PublicationManager;
use Livewire\Component;
use Livewire\WithPagination;

class ShowMyReservation extends Component
{
    use WithPagination;
    private  $avis_permutations=[];
    public function anyItems(){
        return count($this->avis_permutations)>0;
    }
    public function annuler_reservation($avis_id)
    {
        $manager = new PublicationManager($avis_id);
        $manager->annulerReservation();
    }
    public function imprimer_fiche_permutation($avis_id)
    {
        $manager = new PublicationManager($avis_id);
        $manager->imprimer();
    }
    public function refreshData()
    {

        $this->avis_permutations = PctHelper::getAgentReservations(PctHelper::getCurentAgent());

    }
    public function mount()
    {

        $this->avis_permutations = PctHelper::getAgentReservations(PctHelper::getCurentAgent());

    }
    public function render()
    {
        $this->refreshData();
        return view('livewire.show-my-reservation',
        ['avis_permutations'=>$this->avis_permutations]);
    }
}
