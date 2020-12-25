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
        //check
        if ($team->members->contains(auth()->user()) || auth()->id() == $team->manager_id){
            return view('pages.Teams.team',compact('team'));
        }
        else{
            abort('403');
        }


    }

    // api ti get all team post
    public function posts (Team $team) {
        //check who can Access Team Post
        if ($team->members->contains(auth()->user()) || auth()->id() == $team->manager_id){
            return $team->posts()->with('user')->get();
        }
        else
        {
            abort('403');
        }

    }


    //create new post for the team
    public function post (Request $request) {
        $user = User::where('id',$request->userid)->first();
        $team = Team::where('id',$request->teamid)->first();

        //check who can post on the team
        if ($team->members->contains($user) || $user->id == $team->manager_id)
        {
            $post =  Post::create([
                'user_id'=>$request->userid,
                'team_id'=>$request->teamid,
                'content'=>$request->post,
            ]);
            //change to carbon instance to change the format of date
            $createat = Carbon::parse($post->created_at);

            SendNewPost::dispatch($user->id,$user->gender,$user->fullname,$user->avatar,$post->content,$createat->format('d-m-Y' .'  ' . 'h:m'),$request->teamid);
        }
        else{
            abort('403');
        }

    }
}
