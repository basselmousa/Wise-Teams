<?php

namespace App\Http\Controllers\Teams;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamJoinController extends Controller
{
    public function findpage () {
        return view('Pages.Teams.find_teams');
    }
    public function finding ( Request $request) {
          $teams =  Team::where('name',$request->name)->get();
              return view('pages.Teams.find_teams',compact('teams'));
    }
    public function join (Team $team) {
            if ($team->joining) {
                if ($team->manager_id != auth()->id()){
                    try {
                        $team->members()->save(auth()->user());
                        return redirect(route('teams.teams'))->with('success', 'You Join' . $team->name);
                    }
                    catch (\Exception $e){
                         return redirect(route('teams.find'))->with('toast_error', 'Something went wrong');
                    }

                }
                else {
                    return redirect(route('teams.find'))->with('toast_error', 'You can`t join your team ');
                }

            }
            else{
                return redirect(route('teams.find'))->with('toast_error', 'This team is private team');
            }
    }
}
