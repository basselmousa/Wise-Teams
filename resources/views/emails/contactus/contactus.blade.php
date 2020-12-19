@component('mail::message')
# Contact Message

## Hi There And Welcome
## I Faced A problem in your website and came here to complain so please read my problem

## My Problem is :
### {{ $message }}

Thanks for giving me a little of your time,<br>

This complaint from <span style="color: red"> {{ $email }}</span> <br>
to {{ config('mail.from.address') }}
{{ config('app.name') }}
@endcomponent
