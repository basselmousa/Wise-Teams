<?php

namespace App\Http\Controllers\Teams\Assignments;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamsAssignments\TeamsAssignmentsRequest;
use App\Mail\TeamAssignments\TeamAssignmentsEmail;
use App\Models\Assignment;
use App\Models\Team;
use App\Notifications\TeamAssignmentNotification;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class TeamsAssignmentController extends Controller
{
    /**
     * Show Assignments And User Grade
     */
    public function index(Team $id)
    {

        $assignments = $id->assignments;
        $grades = auth()->user()->assignments;
        $gradesArray = [];
        $filesArray = [];
        foreach ($grades as $grade) {
            $gradesArray[$grade->pivot->assignment_id] = $grade->pivot->grade;
        }
        foreach ($grades as $grade) {
            $filesArray[$grade->pivot->assignment_id] = $grade->pivot->file_path;
        }


        return view('pages.Teams.Assignments.assignments', compact('assignments', 'id', 'gradesArray', 'filesArray'));
    }

    /**
     * Show Create Assignment Form
     */
    public function create(Team $id)
    {
        if (auth()->id() != $id->manager->id) {
            abort(401);
        }
        return view('pages.Teams.Assignments.new', compact('id'));
    }

    /**
     * Create Assignment
     */
    public function store(TeamsAssignmentsRequest $request, Team $id)
    {
        try {
            $ass = Assignment::create([
                'team_id' => $id->id,
                'name' => $request->name,
                'question' => $request->questions,
                'points' => $request->point,
                'ending_date' => $request->date
            ]);
            foreach ($id->members as $member) {
                $member->notify(new TeamAssignmentNotification(
                    $id->name,
                    url('teams/' . $id->id . '/assignments/Member-Assignment/' . $ass->id),
                    $ass->ending_date->diffForHumans(),
                    $member->username
                ));
            }
            return redirect()->route('teams.assignments.index', $id->id)->with('success', 'Assignment Created Successfully');
        } catch (\Exception $e) {
            return redirect()->route('teams.assignments.new', $id->id)->with('toast_error', $e->getMessage());
        }
    }

    /**
     * Show Team Assignments
     */
    public function show(Team $id, Assignment $assignment)
    {
        $user = $assignment->users;
        foreach ($id->members as $member) {
            if ($member->id == auth()->id() || $id->manager_id == auth()->id()){
                return view('pages.Teams.Assignments.assignment_for_member', compact('assignment', 'user'));
            }
        }
        abort(401, 'You are not members of that team ');
    }

    /**
     * Delete Assignment
     */
    public function destroy(Team $id, Assignment $assignment)
    {
        if ($id->manager_id != auth()->id()){
            abort(401);
        }
        try {
            $assignment->delete();
            return redirect()->route('teams.assignments.index', [$id->id])->with('success', 'Assignment ' . $assignment->name . " Deleted Successfully");
        } catch (\Exception $e) {
            return redirect()->route('teams.assignments.index', [$id->id])->with('toast_error', $e->getMessage());
        }
    }
}
