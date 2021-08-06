<?php
namespace   App\Pct;

use App\Mail\AvisConfirmationCanceled;
use App\Mail\AvisConfirmed;
use App\Mail\AvisListePublished;
use App\Mail\AvisReservationCanceled;
use App\Mail\AvisReserved;
use App\Mail\AvisValidated;
use App\Mail\AvisValidationCanceled;
use App\Models\Agent;
use App\Models\AvisPermutation;
use Illuminate\Support\Facades\Mail;

class EmailHelper
{
    public static function SendIsAvisReservationCanceled(AvisPermutation $avis, $agent_id){
        $to = $avis->agentDemandeur->user->email;
        $agent = Agent::findOrFail($agent_id);
        $cc = $$agent->user->email;
        $message = new AvisReservationCanceled($avis,$agent);
        self::Send($to,$message,$cc);

    }
    public static function SendIsAvisConfirmationCanceled($avis,$agent_id){
        $cc = $avis->agentDemandeur->user->email;
        $agent = Agent::findOrFail($agent_id);
        $to = $agent->user->email;
        $message = new AvisConfirmationCanceled($avis,$agent);
        self::Send($to,$message,$cc);

    }
    public static function SendIsAvisValidatationCanceled($avis){
        $cc = $avis->agentDemandeur->user->email;
        $to = $avis->agentFavorable->user->email;
        $message = new AvisValidationCanceled($avis);
        self::Send($to,$message,$cc);

    }
    public static function SendIsAvisReserved(AvisPermutation $avis){
        $to = $avis->agentDemandeur->user->email;
        $cc = $avis->agentFavorable->user->email;
        $message = new AvisReserved($avis);
        self::Send($to,$message,$cc);

    }
    public static function SendIsAvisConfirmed($avis){
        $cc = $avis->agentDemandeur->user->email;
        $to = $avis->agentFavorable->user->email;
        $message = new AvisConfirmed($avis);
        self::Send($to,$message,$cc);

    }
    public static function SendIsAvisValidated($avis){
        $cc = $avis->agentDemandeur->user->email;
        $to = $avis->agentFavorable->user->email;
        $message = new AvisValidated($avis);
        self::Send($to,$message,$cc);

    }
    public static function SendIsListPublished($avis){
        $to = $avis->agentDemandeur->user->email;
        $cc = $avis->agentFavorable->user->email;
        $message = new AvisListePublished($avis);
        self::Send($to,$message,$cc);

    }
    private static function Send($to,$mail,$cc){
        Mail::to($to)
        ->cc($cc)
        ->queue($mail);
    }

}
