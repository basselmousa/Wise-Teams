<?php

namespace App\Http\Controllers\Teams;

use App\Events\SendNewPost;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Team;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;


class TeamChatController extends Controller
{

    //redirect to team chat view
    public function index (Team $team) {
        return view('pages.Teams.team',compact('team'));

    }

    // api ti get all team post
    public function posts (Team $team) {
        return $team->posts()->with('user')->get();
    }


    //create new post for the team
    public function post (Request $request) {
      $post =  Post::create([
            'user_id'=>$request->userid,
            'team_id'=>$request->teamid,
            'content'=>$request->post,
        ]);
      $user = User::where('id',$request->userid)->first();
        $createat = Carbon::parse($post->created_at);

        SendNewPost::dispatch($user->id,$user->gender,$user->fullname,$user->avatar,$post->content,$createat->format('d-m-Y' .'  ' . 'h:m'),$request->teamid);
    }
}
