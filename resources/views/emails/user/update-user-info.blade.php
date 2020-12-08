@component('mail::message')
# Profile Updated Successfully

## This Email to let you know that your profile data has been updated successfully
## now you can see your new data in your profile page

@component('mail::button', ['url' => $url])
Go To Your Profile
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
