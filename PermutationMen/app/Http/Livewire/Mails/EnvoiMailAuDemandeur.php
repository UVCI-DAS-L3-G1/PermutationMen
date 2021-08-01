<?php

namespace App\Http\Livewire\Mails;

use Livewire\Component;
use app\Models\User;
use app\Models\AvisPermutation;

class EnvoiMailAuDemandeur extends Component
{

    public function mount(AvisPermutation $avis)
    {
        $this->avis = $avis;
        Mail::to($avis.agentDemandeur.user.email)->send(new EnvoiMailAuDemandeur);
    }

}
