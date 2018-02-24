@component('mail::message')
# Hvala vam na registraciji {{ $user->name }}

Klikni te na dugme i startujte vasu kupovinu kod nas.
Bon Apetit

@component('mail::button', ['url' => ''])
Food Store
@endcomponent

Hvala,<br>
{{ config('app.name') }}
@endcomponent
