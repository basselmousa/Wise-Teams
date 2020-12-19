@component('mail::message')
# Assignment uploaded

## Student {{ $username }} Was Upload A file To Assignment {{ $assignment }}

@component('mail::button', ['url' => $url])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
