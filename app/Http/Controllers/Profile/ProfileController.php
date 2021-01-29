<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\UpdateProfileRequest;
use App\Mail\DeleteUserProfileEmail;
use App\Mail\UpdateUserProfileEmail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Show profile page
     */
    public function show(User $id)
    {
        return view('pages.Profile.profile', compact('id'));
    }


    /**
     * show Edit Profile Page
     */
    public function edit(User $id)
    {

        if ($id->id != auth()->id()){
            abort(401);
        }


        return view('pages.Profile.Edit-Profile', compact('id'));
    }

    /**
     * Update User Profile
     */
    public function update(UpdateProfileRequest $request, User $id)
    {
        if ($id->id != auth()->id()){
            abort(401);
        }
        $id->update([
            'email' => $request['email'],
            'fullname' => $request['fullname'],
            'gender' => $request['gender'],
            'specialization' => $request['specialization'],
            'status' => $request['status'],
        ]);
        Mail::to($id->email)->send(new UpdateUserProfileEmail($id->id));
        return redirect()->route('profile.home', $id->id)->with('success', 'Your profile Is Updated');
    }

    /**
     * Delete User Profile
     */
    public function destroy(User $id)
    {
        if (auth()->id() != $id->id){
            abort(401);
        }
        try {
            $id->delete();
            Mail::to($id->email)->send(new DeleteUserProfileEmail());
        } catch (\Exception $e) {
            return  redirect()->route('profile.home', $id)->with('error', $e->getMessage());
        }
        return redirect()->route('home');
    }
}
