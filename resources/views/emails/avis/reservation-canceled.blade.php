@component('mail::message')
 
{{$agent->user->name}}<br>
E-mail : {{$agent->user->email}}<br>
Tél.: {{$agent->user->mobile_phone}}<br>
Tél.:{{$agent->user->office_phone}}<br>
Dren:{{$agent->ecole->iep->dren->nom}}<br>
IEP:{{$agent->ecole->iep->nom}}<br>
Ecole:{{$agent->ecole->nom}}<br>

n'est plus disposé à permuter avec vous.<br>



Merci,<br>
{{ config('app.name') }}
@endcomponent

