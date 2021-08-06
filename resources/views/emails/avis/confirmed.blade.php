@component('mail::message')

**{{$avis->agentDemandeur->user->name}}**<br>
E-mail : {{$avis->agentDemandeur->user->email}}<br>
Tél. mobile: {{$avis->agentDemandeur->user->mobile_phone}}<br>
Tél. bureau: {{$avis->agentDemandeur->user->office_phone}}<br>
Dren: {{$avis->agentDemandeur->ecole->iep->dren->nom}}<br>
IEP: {{$avis->agentDemandeur->ecole->iep->nom}}<br>
Ecole: {{$avis->agentDemandeur->ecole->nom}}<br>

à confirmer votre réservation.<br>

@component('mail::button', ['url' => route('fiche-demande',['id'=>$avis->id])])
Imprimer votre fiche de demande de permutation
@endcomponent

@component('mail::panel')
Vous êtes prié de la faire signer par votre direction et de la déposer à la DRH sise au plateau.
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
