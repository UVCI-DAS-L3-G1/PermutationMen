@component('mail::message')

{{$avis->agentDemandeur->user->name}}<br>
E-mail : {{$avis->agentDemandeur->user->email}}<br>
Tél.: {{$avis->agentDemandeur->user->mobile_phone}}<br>
Tél.:{{$avis->agentDemandeur->user->office_phone}}<br>
Dren:{{$avis->agentDemandeur->ecole->iep->dren->nom}}<br>
IEP:{{$avis->agentDemandeur->ecole->iep->nom}}<br>
Ecole:{{$avis->agentDemandeur->ecole->nom}}<br>

n'est plus disposer à permuter avec vous<br>

Merci,<br>
{{ config('app.name') }}
@endcomponent

