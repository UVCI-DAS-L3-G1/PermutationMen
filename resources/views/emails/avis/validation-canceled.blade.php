@component('mail::message')
 
La demande de permutation numéro {{$avis->id}} entre :

{{$avis->agentFavorable->user->name}}<br>
E-mail : {{$avis->agentFavorable->user->email}}<br>
Tél.: {{$avis->agentFavorable->user->mobile_phone}}<br>
Tél.:{{$avis->agentFavorable->user->office_phone}}<br>
Dren:{{$avis->agentFavorable->ecole->iep->dren->nom}}<br>
IEP:{{$avis->agentFavorable->ecole->iep->nom}}<br>
Ecole:{{$avis->agentFavorable->ecole->nom}}<br>

et :
{{$avis->agentDemandeur->user->name}}<br>
E-mail : {{$avis->agentDemandeur->user->email}}<br>
Tél.: {{$avis->agentDemandeur->user->mobile_phone}}<br>
Tél.:{{$avis->agentDemandeur->user->office_phone}}<br>
Dren:{{$avis->agentDemandeur->ecole->iep->dren->nom}}<br>
IEP:{{$avis->agentDemandeur->ecole->iep->nom}}<br>
Ecole:{{$avis->agentDemandeur->ecole->nom}}<br>

à été validée<br>

Merci,<br>
{{ config('app.name') }}
@endcomponent

