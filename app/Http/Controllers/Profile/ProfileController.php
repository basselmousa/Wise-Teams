<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\UpdateProfileRequest;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.Profile.profile');
    }


    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
//        dd(auth()->user());

        return view('pages.Profile.Edit-Profile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateProfileRequest $request)
    {
//        dd($request['status']);
        $user = User::find(auth()->id());
        $user->update([
            'email' => $request['email'],
            'fullname' => $request['fullname'],
            'gender' => $request['gender'],
            'specialization' => $request['specialization'],
            'status' => $request['status'],
        ]);
        return redirect()->route('profile.home')->with('success', 'Your profile Is Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $request->user()->delete();
        return redirect()->route('home');
    }
}
