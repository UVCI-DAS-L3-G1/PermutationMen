@component('mail::message')
# Avis reservé!
**{{$avis->agentFavorable->user->name}}**<br>
E-mail : {{$avis->agentFavorable->user->email}}<br>
Tél.: {{$avis->agentFavorable->user->mobile_phone}}<br>
Tél.: {{$avis->agentFavorable->user->office_phone}}<br>
Dren: {{$avis->agentFavorable->ecole->iep->dren->nom}}<br>
IEP: {{$avis->agentFavorable->ecole->iep->nom}}<br>
Ecole: {{$avis->agentFavorable->ecole->nom}}<br>

a accepter votre demande de permutation numéro {{$avis->id}}.<br>

@component('mail::button', ['url' => route('my_dashboard')])
Veuillez prendre contact avec lui/elle et confirmer la réservation.
@endcomponent
@component('mail::panel')
En cas de non confirmation dans un meilleur délai, l'acceptation sera annulée.
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
