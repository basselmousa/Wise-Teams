<?php

namespace App\Http\Controllers\Teams;

use App\Http\Controllers\Controller;
use App\Models\Meeting;
use App\Models\Team;
use App\Notifications\MeetingStartingNotification;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function index(Team $team)
    {
        return view('pages.Teams.meeting', compact('team'));
    }

    public function store(Request $request)
    {
        Meeting::updateOrCreate(['team_id' => $request->teamid], [
            'team_id' => $request->teamid,
            'tokens' => $request->tokens
        ]);
        $team = Team::find($request->teamid);
        foreach ($team->members as $member) {
            $member->notify(new MeetingStartingNotification($member->fullname, $team->name, $team->manager->fullname));
        }
    }

    public function getTeamToken(Team $team)
    {
        $meering = $team->meeting()->first();
        return $meering->tokens;
    }

    public function destroy(Team $team)
    {
        $team->meeting()->delete();
        return redirect(route('teams.teams'));
    }
}
