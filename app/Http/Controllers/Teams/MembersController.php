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



    public function index (Team $team) {
        $members = $team->members()->get();
        return view('Pages.Teams.members',compact('members','team'));
    }





    public function new ( Team $team){
       if ($team->adding == 1 || $team->manager_id == auth()->id()){
           return view('Pages.Teams.add',compact('team'));
       }
       else
       {
           abort('403');
       }
    }


    public function find (AddNewMember $request,Team $team){
      $users =  User::where('username',$request->username)->get();
      return view('Pages.Teams.add',compact('users','team'));
    }



    public function add (Request $request , Team $team) {
        $user = User::find($request->member);
        try {
            if ($user->id != $team->manager_id) {
                $team->members()->save($user);
                return redirect(route('teams.teams'))->with('success', 'You add' . $user->fullname);
            }
            else{
                return  redirect(route('teams.teams'))->with('toast_error', 'You can`t add your self');;
            }
        }
        catch (\Exception $e) {
            return redirect(route('teams.teams'))->with('toast_error', 'You can`t add'. $user->fullname);
        }
    }
}
