<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('SendNewPost.{team}', function ($user, \App\Models\Team $team) {
   if ($team->members->contains($user) || $user->id == $team->manager_id){
       return true;
   }
   else {
       return  false;
   }
});
