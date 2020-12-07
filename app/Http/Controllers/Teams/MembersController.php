<?php

namespace App\Http\Controllers\Teams;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    public function index (Team $team) {
        $members = $team->members()->get();
        return view('Pages.Teams.members',compact('members','team'));
    }
}
