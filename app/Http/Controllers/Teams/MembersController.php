<?php

namespace App\Http\Controllers\Teams;

use App\Http\Controllers\Controller;
use App\Http\Requests\Team\AddNewMember;
use App\Http\Team\Requests\Team\FindNewMember;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
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

      $users =  User::where('username',$request->username)->get();
      return view('Pages.Teams.add',compact('users','team'));

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
                        return redirect(route('teams.teams'))->with('success', 'You add' . $user->fullname);
                    }catch (\Exception $exception){
                        if ($exception->getCode() == 23000){
                            return redirect(route('teams.teams'))->with('toast_error', "This User Is Exists In This Team");
                        }
                        return redirect(route('teams.teams'))->with('toast_error', $exception->getCode());
                    }
                }
                else{
                    return  redirect(route('teams.teams'))->with('toast_error', 'You can`t add your self');;
                }
            }
            catch (\Exception $e) {
                return redirect(route('teams.teams'))->with('toast_error', 'You can`t add'. $user->fullname. $e->getMessage());
            }

        }

    }
}
