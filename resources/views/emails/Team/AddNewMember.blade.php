@component('mail::message')
# Added In New Team

## {{ $manager }} has added you in {{$team}} Team

@component('mail::button', ['url' => 'http://127.0.0.1:8000/teams'])
Check it out
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
