<?php

namespace App\Http\Controllers\Teams;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamChatController extends Controller
{
    public function index (Team $team) {
        return view('pages.Teams.team',compact('team'));

    }
    public function posts (Team $team) {
        return $team->posts()->with('user')->get();
    }
    public function post (Request $request) {
        Post::create([
            'user_id'=>$request->userid,
            'team_id'=>$request->teamid,
            'content'=>$request->post,
        ]);
    }
}
