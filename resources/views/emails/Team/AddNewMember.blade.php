@component('mail::message')
# Added In New Team

## {{ $manager }} has added you in {{$team}} Team

@component('mail::button', ['url' => $url])
Check it out
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
