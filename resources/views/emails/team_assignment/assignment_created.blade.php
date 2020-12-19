@component('mail::message')
# Assignment Created

## New Assignment Created For Team {{ $name }}
## Available To {{ $duration }}
@component('mail::button', ['url' => $url])
See It
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
