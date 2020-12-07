<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\ProfileAvatarRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UploadAvatarController extends Controller
{


    public function uploadAvatar(Request $request, User $id)
    {
        if ($request->user()->id != $id->id) {
            abort(401);
        }

        $avatar = $this->getImagePath($request->file('avatar'));
        try {
            $id->update([
                'avatar' => $avatar
            ]);
            return redirect()->route('profile.home', $id->id)->with('toast_success', 'Your Image Is Updated Successfully');
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
