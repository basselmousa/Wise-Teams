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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(User $id)
    {
        return view('pages.Profile.profile', compact('id'));
    }


    /**
     * Display the specified resource.
     *
     * @param User $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(User $id)
    {
//        dd(auth()->user());
        if ($id->id != auth()->id()){
            abort(401);
        }


        return view('pages.Profile.Edit-Profile', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProfileRequest $request
     * @param User $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateProfileRequest $request, User $id)
    {
//        dd($request['status']);
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
     * Remove the specified resource from storage.
     *
     * @param User $id
     * @return \Illuminate\Http\RedirectResponse
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
