@component('mail::message')
    Hello Mr {{ $userFullName }} The New Meeting Starts On Team {{ $teamName }}
Thanks,<br>
{{ config('app.name') }}
@endcomponent
