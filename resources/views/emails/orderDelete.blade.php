@component('mail::message')
# Narudzba ponistena

Vasa narudzba je ponistena.
Hvala vam na posjeti.

@component('mail::button', ['url' => ''])
Food Store
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
