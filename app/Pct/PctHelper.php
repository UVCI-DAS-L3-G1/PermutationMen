<?php

namespace App\Pct;

use App\Models\Agent;
use App\Models\AvisPermutation;
use App\Models\Discipline;
use App\Models\Dren;
use App\Models\Ecole;
use App\Models\Emploi;
use App\Models\Fonction;
use App\Models\Iep;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PctHelper
{
    public static function getResultatPermutations($location,$id)
    {
        $avis =self::genereListePermutationQuery($location,$id)->get();
        return self::genereListePermutationAdmis($avis);
    }
    public static function genereListePermutationAdmis($avis_permutations)
    {
        $avis_admis =[];
        foreach($avis_permutations as $avis)
        {
            $admisDem = new Admis();
            $admisDem->id = $avis->id;
            $admisDem->matricule = $avis->agentDemandeur->matricule;
            $admisDem->nom = $avis->agentDemandeur->user->name;
            $admisDem->ecoleOrigine = $avis->agentDemandeur->ecole->nom;
            $admisDem->ecoleDestination = $avis->ecole->nom;

            $admisFav = new Admis();
            $admisFav->id = $avis->id;
            $admisFav->matricule = $avis->agentFavorable->matricule;
            $admisFav->nom = $avis->agentFavorable->user->name;
            $admisFav->ecoleOrigine = $avis->agentFavorable->ecole->nom;
            $admisFav->ecoleDestination = $avis->agentDemandeur->ecole->nom;

            array_push($avis_admis,$admisDem);
            array_push($avis_admis,$admisFav);
        }
        usort($avis_admis,fn($a,$b)=>strcmp($a->nom,$b->nom));
        return $avis_admis;
    }
    public static function genereListePermutationQuery($location,$id)
    {

        $q='';
        $query=AvisPermutation::query()
        ->select("avis_permutations.*")
        ->join('agents', 'avis_permutations.agent_demandeur_id', '=', 'agents.id')
        ->join('users', 'agents.id', '=', 'users.id')
        ->join('ecoles', 'agents.ecole_id', '=', 'ecoles.id')
        ->join('ieps', 'ecoles.iep_id', '=', 'ieps.id')
        ->join('drens', 'ieps.dren_id', '=', 'drens.id')
        ->where('etat',AvisPermutation::valide()) ;

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
        return $q;
    }
    public static function canPublish()
    {
        if(!AppConfig::isOpened()) return false;
        $isAgent = self::currentIsAgent();

        if (!$isAgent) return false;
        $user_id = Auth::user()->id;
        $exist = AvisPermutation::where('etat', '>', AvisPermutation::libre())
            ->where(function ($q) use ($user_id) {

                $q->where('agent_demandeur_id', $user_id)
                    ->orWhere('agent_interesse_id', $user_id);
            })->exists();

        return !$exist;
    }

    public static function currentIsRegistrationCompleted()
    {
        return self::isRegistrationCompleted(Auth::user()->id);
    }
    public static function isRegistrationCompleted($user_id)
    {
        if (!self::mustRegister($user_id)) return true;
        return !empty(Agent::find($user_id));
    }

    public static function currentMustRegister()
    {
        return self::mustRegister(Auth::user()->id);
    }
    public static function mustRegister($user_id)
    {

        $user = User::find($user_id);
        return $user->isUser();
    }

    public static function currentIsPublisher()
    {
        return  self::isPublisher(Auth::user()->id);
    }
    public static function isPublisher($user_id)
    {

        $nbre = AvisPermutation::where('agent_demandeur_id', $user_id)
            ->orWhere('agent_interesse_id', $user_id)->count();
        return $nbre > 0;
    }
    public static function currentIsAgent()
    {

        return self::isAgent(Auth::user()->id);
    }
    public static function isAgent($user_id)
    {
        $user = User::findOrFail($user_id);
        $agent = Agent::find($user_id);
        return $user->isUser() && !empty($agent?->matricule);
    }


    public static function getCurentAgent(): ?Agent
    {
        $user_id = Auth::user()->id;
        $agent = Agent::with('user', 'ecole.iep.dren')->find($user_id);
        return $agent;
    }
    public static function getPlacesDisponibleDate(?Agent $agent, $date_debut,$date_fin)
    {
        return self::getPlacesDisponibleQuery($agent)
            ->where('avis_permutations.date_publication','>=',$date_debut)
            ->where('avis_permutations.date_publication','<=',$date_fin)
            ->paginate(AppConfig::pagination());
    }
    public static function getPlacesDisponibleInfosAgent(?Agent $agent, $motCles)
    {
        return self::getPlacesDisponibleQuery($agent)
            ->where('users.name', $motCles)
            ->orWhere('users.mobile_phone',$motCles)
            ->orWhere('users.office_phone',$motCles)
            ->orWhere('agents.matricule',$motCles)
            ->orWhere('users.maiden_name',$motCles)
            ->paginate(AppConfig::pagination());
    }
    public static function getPlacesDisponibleNumAvis(?Agent $agent, $d)
    {
        return self::getPlacesDisponibleQuery($agent)
            ->where('avis_permutations.id', $d)
            ->paginate(AppConfig::pagination());
    }
    public static function getPlacesDisponibleEcole(?Agent $agent, $ecoleId)
    {
        return self::getPlacesDisponibleQuery($agent)
            ->where('ecoles.id', $ecoleId)
            ->paginate(AppConfig::pagination());
    }
    public static function getPlacesDisponibles(?Agent $agent)
    {

        return self::getPlacesDisponibleQuery($agent)->paginate(AppConfig::pagination());
    }
    public static function getPlacesDisponibleDren(?Agent $agent, $drenId)
    {

        return self::getPlacesDisponibleQuery($agent)
                    ->where('drens.id', $drenId)
                    ->paginate(AppConfig::pagination());
    }

    public static function getPlacesDisponibleIep(?Agent $agent, $iepId)
    {
        return self::getPlacesDisponibleQuery($agent)
            ->where('ieps.id', $iepId)
            ->paginate(AppConfig::pagination());
    }
    private static function getPlacesDisponibleQuery(?Agent $agent)
    {

        $query=AvisPermutation::query()
        ->select("avis_permutations.*")
        ->join('agents', 'avis_permutations.agent_demandeur_id', '=', 'agents.id')
        ->join('users', 'agents.id', '=', 'users.id')
        ->join('ecoles', 'agents.ecole_id', '=', 'ecoles.id')
        ->join('ieps', 'ecoles.iep_id', '=', 'ieps.id')
        ->join('drens', 'ieps.dren_id', '=', 'drens.id');


        if (is_null($agent)) {

            return $query;//->where('etat', AvisPermutation::libre());

        }
        //dump($query->toSql());

        $q= $query->where('etat', AvisPermutation::libre())
            ->where('agents.fonction_id', $agent->fonction_id)
            ->where('agents.emploi_id', $agent->emploi_id)
            ->where('agents.discipline_id', $agent->discipline_id)
            ->where('ecole_destination_id', $agent->ecole->id);

            //dump($q->toSql());

        return $q;


    }



    public static function getEcolesDisponiblesEcole(?Agent $agent, $ecoleId)
    {
        return self::getEcolesDisponiblesQuery($agent)
            ->where('ecoles.id', $ecoleId)
            ->paginate(AppConfig::pagination());
    }
    public static function getEcolesDisponiblesDren(?Agent $agent, $drenId)
    {
        $q = self::getEcolesDisponiblesQuery($agent)
            ->join('ieps', 'ecoles.iep_id', '=', 'ieps.id')
            ->join('drens', 'ieps.dren_id', '=', 'drens.id')
            ->where('ieps.dren_id', $drenId)
            ->select('ecoles.*');
        return $q->paginate(AppConfig::pagination());
    }

    public static function getEcolesDisponiblesIep(?Agent $agent, $iepId)
    {
        return self::getEcolesDisponiblesQuery($agent)
            ->where('iep_id', $iepId)->paginate(AppConfig::pagination());
    }
    private static function getEcolesDisponiblesQuery(?Agent $agent)
    {
        $autoReservation = AppConfig::auto_reservation();
        $agent = self::getCurentAgent();
        $idsExclus = [$agent->ecole_id];
        $pubs = AvisPermutation::where('agent_demandeur_id', $agent->id)
        ->pluck('ecole_destination_id')->all();
        foreach ($pubs as $id) {
            array_push($idsExclus, $id);
        }
        if ($autoReservation) {
            $ids = self::getPlacesDisponibleQuery($agent)
                ->pluck('ecole_destination_id')->all();
            foreach ($ids as $id) {
                array_push($idsExclus, $id);
            }
        }
        $q = Ecole::with('iep.dren')
            ->whereNotIn('ecoles.id', $idsExclus)
            ->orderBy('ecoles.nom');
        return $q;
    }
    public static function getAgentPublicationsQuery($agent)
    {
        return AvisPermutation::with(
            'agentDemandeur.ecole.iep.dren',
            'agentDemandeur.user',
            'agentFavorable.user',
            'agentFavorable.fonction',
            'agentFavorable.emploi',
            'agentFavorable.discipline')
            ->where('agent_demandeur_id','=', $agent->id)
            ->orderBy('date_publication');
    }
    public static function getAgentPublications($agent)
    {
        return self::getAgentPublicationsQuery($agent)
        ->paginate(AppConfig::pagination());
    }
    public static function getAgentReservations($agent)
    {
        $q= AvisPermutation::with(
            'agentDemandeur.ecole.iep.dren',
            'agentFavorable.user',
            'agentFavorable.fonction',
            'agentFavorable.emploi',
            'agentFavorable.discipline'
        )
        ->where('agent_interesse_id','=', $agent->id);

            return $q->paginate();
    }

}
