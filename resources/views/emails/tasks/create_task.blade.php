@component('mail::message')
# Hello Mr. {{ $manager }}

## You Are Create Task On Team {{ $team }}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
