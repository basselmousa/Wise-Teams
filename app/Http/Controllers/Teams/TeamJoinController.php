<?php

namespace App\Http\Controllers\Teams;

use App\Http\Controllers\Controller;
use App\Http\Requests\Team\FindNewTeam;
use App\Models\Team;
use Exception;
use Illuminate\Http\Request;

class TeamJoinController extends Controller
{

    //Finding Team page
    public function findpage()
    {
        return view('Pages.Teams.find_teams');
    }


    //Find a team that we interred  its name AND send its data to finding page
    public function finding(FindNewTeam $request)
    {
        $teams = Team::where('name', $request->name)->get();
        return view('pages.Teams.find_teams', compact('teams'));
    }


    //Join the team that we found
    public function join(Team $team)
    {
        //check if the team can be joined by any one
        if ($team->joining) {

            //check that if the team manager try to be a member
            if ($team->manager_id != auth()->id()) {
                try {
                    $team->members()->save(auth()->user());
                    return redirect(route('teams.teams'))->with('success', 'You Join' . $team->name);
                } catch (Exception $e) {
                    return redirect(route('teams.find'))->with('toast_error', 'Something went wrong');
                }

            } else {
                return redirect(route('teams.find'))->with('toast_error', 'You can`t join your team ');
            }

        } else {
            return redirect(route('teams.find'))->with('toast_error', 'This team is private team');
        }
    }


    //Leaving a team
    public function leaving(Team $team)
    {
        $team->members()->detach(auth()->user());
        return redirect(route('teams.teams'))->with('success', 'You left' . $team->name);
    }
}
