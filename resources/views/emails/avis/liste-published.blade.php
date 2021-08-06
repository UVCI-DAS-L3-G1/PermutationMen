@component('mail::message')
 

@component('mail::panel')
La liste des permutation est disponible.
@component('mail::button', ['url' => $consultationAvisUrl])
Consulter
@endcomponent
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
