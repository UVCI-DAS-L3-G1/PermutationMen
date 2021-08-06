<?php

namespace   App\Pct;

use App\Models\Agent;
use App\Models\AvisPermutation;
use App\Models\Dren;
use App\Models\Ecole;
use App\Models\Iep;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PublicationManager
{

    public ?Agent $agent;
    public AvisPermutation $avis;

    public function __construct($avisId = 0)
    {
        $this->agent = PctHelper::getCurentAgent();
        $this->firstOrCreate($avisId);
    }



    private function firstOrCreate($avisId)
    {

        $this->avis = AvisPermutation::firstOrNew(
            ['id' => $avisId],
            [
                'agent_demandeur_id' => $this->agent?->id ?? 0,
                'date_publication' => now(),
                'etat' => AvisPermutation::libre()
            ]
        );
    }
    public function publier(int $ecoleId)
    {
        $ok = true;
        if (AppConfig::auto_reservation()) {
            $nbre = PctHelper::getPlacesDisponibleEcole($this->agent, $ecoleId)->count();
            $ok = $nbre == 0;
        }

        if ($ok) {

            $this->avis->ecole_destination_id = $ecoleId;
            $this->avis->save();
            return true;
        }

        return false;
    }
    public function imprimer()
    {
        
        redirect()->route('fiche-demande',['id'=>$this->avis->id]);

    }
    public function reserver()
    {
        $avis = $this->avis;
        if (!is_null($avis)) {

            $agentId = PctHelper::getCurentAgent()->id;
            $avis->agent_interesse_id = $agentId;
            $avis->date_reservation = now();
            $avis->etat = AvisPermutation::reserve();
            if ($avis->save()) {

                $this->editOtherEtat(AvisPermutation::inactif());

                //Appel EmailManager pour envoie de mail au demandeur que son avis a été réservé
                EmailHelper::SendIsAvisReserved($avis);
            }
        }
    }
    private function applyNewStateToOtherAvis($agent,$etat)
    {


        if (!is_null($agent)) {
            $mesPublications = PctHelper::getAgentPublicationsQuery($agent)
                ->get();


            if (!empty($mesPublications)) {
                foreach ($mesPublications as $avisDemandeur) {
                    if ($avisDemandeur->id == $this->avis->id) continue;
                    $avisDemandeur->etat = $etat;
                    $avisDemandeur->save();
                }
            }
        }
    }
    private function editOtherEtat($etat)
    {
        $avis = $this->avis;

        $agentDemandeur = Agent::find($avis->agent_demandeur_id);
        $agentInteresse = Agent::find($avis->agent_interesse_id);
        $this->applyNewStateToOtherAvis($agentDemandeur,$etat);
        $this->applyNewStateToOtherAvis($agentInteresse,$etat);


    }
    public function annulerReservation()
    {
        $avis =  $this->avis;
        if (!is_null($avis)) {
            $avis->etat = AvisPermutation::libre();
            $avis->date_reservation = null;
            $avis->agent_interesse_id = null;
            if ($avis->save()) {

                $this->editOtherEtat(AvisPermutation::libre());
                //Appel EmailManager pour envoie de mail au demandeur que la reservation a ete annule
                EmailHelper::SendIsAvisReservationCanceled($avis);
            };
        }
    }
    public function confirmer()
    {
        $avis  = $this->avis;
        if (!is_null($avis)) {
            $avis->date_confirmation = now();
            $avis->etat = AvisPermutation::confirme();
            if ($avis->save()) {
                EmailHelper::SendIsAvisConfirmed($avis);
            };
        }
    }
    public function annulerConfirmation()
    {
        $avis = $this->avis;
        if (!is_null($avis)) {
            $avis->etat = AvisPermutation::libre();
            $avis->date_confirmation = null;
            $avis->date_reservation = null;
            $avis->agent_interesse_id = null;
            if ($avis->save()) {

                $this->editOtherEtat(AvisPermutation::libre());
                //Appel EmailManager pour envoie de mail au demandeur que la reservation a ete annule
                EmailHelper::SendIsAvisConfirmationCanceled($avis);
            };
        }
    }
    public function valider()
    {
        $avis = $this->avis;
        if (!is_null($avis)) {
            $avis->date_validation = now();
            $avis->etat = AvisPermutation::valide();
            if ($avis->save()) {
                //Annulation des avis des deux
                //Appel EmailManager pour envoie de mail au demandeur que son avis a été confirmé
                EmailHelper::SendIsAvisValidated($avis);
            };
        }
    }
    public function annulerValidation()
    {
        $avis = $this->avis;
        if (!is_null($avis)) {
            $avis->etat = AvisPermutation::confirme();
            $avis->date_validation = null;
            if ($avis->save()) {

                //$this->editOtherEtat(AvisPermutation::inactif());
                //Appel EmailManager pour envoie de mail au demandeur que la reservation a ete annule

            };
        }
    }
    public function supprimer()
    {
        $avis = $this->avis;
        if (!is_null($avis)) {

            if ($avis->delete()) {
            };
        }
    }
}
