@component('mail::message')
    ## The {{ $task }} Task Is Completed Successfully In Team {{ $team }}
    

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
