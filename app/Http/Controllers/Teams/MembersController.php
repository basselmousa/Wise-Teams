<?php

namespace App\Http\Controllers\Teams;

use App\Http\Controllers\Controller;
use App\Http\Requests\Team\AddNewMember;
use App\Http\Team\Requests\Team\FindNewMember;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\throwException;

class MembersController extends Controller
{


    //get all members for the team
    public function index (Team $team) {
        $members = $team->members()->get();
        return view('Pages.Teams.members',compact('members','team'));
    }




    // redirect to member add view after checking the rules
    public function new ( Team $team){
       if ($team->adding == 1 || $team->manager_id == auth()->id()){
           return view('Pages.Teams.add',compact('team'));
       }
       else
       {
           abort('403');
       }
    }

    //find a member by username
    public function find (AddNewMember $request,Team $team){
        if ($team->manager_id == auth()->id() || $team->adding == 1){
            $users =  User::where('username',$request->username)->get();
            if (count($users)>0){
                return view('Pages.Teams.add',compact('users','team'));
            }
            else{
                return redirect(route('teams.memberFind',['team'=>$team->id]))->with('warning','no such user ');
            }

        }
        else
        {
            abort('403');
        }
    }



    public function add (Request $request , Team $team) {
        //check who can make this action
        if ($team->adding == 1 || $team->manager_id == auth()->id()){
            $user = User::find($request->member);
            try {
                //check if the team manager try to be a member
                if ($user->id != $team->manager_id) {
                    try {
                        $team->members()->save($user);
                        $user->notify(new \App\Notifications\AddNewMember($user->fullname,$team->name,auth()->user()->fullname));
                        return redirect(route('teams.teams'))->with('success', 'You add ' . $user->fullname);
                    }catch (\Exception $exception){
                        if ($exception->getCode() == 23000){
                            //if the user is already in the team
                            return redirect(route('teams.teams'))->with('toast_error', "This User Is Exists In This Team");
                        }
                        else{
                            // if the error code not 23000
                            return redirect(route('teams.teams'))->with('toast_error','something went wrong');
                        }
                    }
                }
                else{
                    //if user try to add team manager
                    return  redirect(route('teams.teams'))->with('toast_error', 'You can`t add team manager');;
                }
            }
            catch (\Exception $e) {
                //other errors
                return redirect(route('teams.teams'))->with('toast_error', 'You can`t add'. $user->fullname);
            }

        }
        else
        {
            // if you have no privilege ti add members
            return redirect(route('teams.teams'))->with('toast_error','you cant add members');

        }

    }
}
