<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\ProfileAvatarRequest;
use App\Mail\UpdateUserAvatarEmail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class UploadAvatarController extends Controller
{


    public function uploadAvatar(ProfileAvatarRequest $request, User $id)
    {
//        dd($request->all());
        if (auth()->user()->id != $id->id) {
            abort(401);
        }
        if (! $request->validated()){
            return redirect()->route('profile.edit', $id->id)->with('toast_error', 'This Type Of Images Not Allowed');
        }
        $avatar = $this->getImagePath($request->file('avatar'));
        try {
            $id->update([
                'avatar' => $avatar
            ]);
<<<<<<< HEAD
//            User::find($id);
            Mail::to($id->email)->send(new UpdateUserAvatarEmail());
            return redirect()->route('profile.edit', $id->id)->with('toast_success', 'Your Image Is Updated Successfully');
=======
            return redirect()->route('profile.home', $id->id)->with('toast_success', 'Your Image Is Updated Successfully');
>>>>>>> 056ed6c2934bca5f6a4f61783a3da1dc28873cdc
        }catch (\Exception $e){
            return redirect()->route('profile.edit', $id->id)->with('toast_error', $e->getMessage());
        }
    }

    public function getImagePath($img)
    {
        if ($img){
            return $img->store('usersAvatar','public');
        }
        return null;
    }
}
