<?php

namespace App\Http\Controllers\Teams\Assignments;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamsAssignments\TeamsAssignmentsRequest;
use App\Mail\TeamAssignments\TeamAssignmentsEmail;
use App\Models\Assignment;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class TeamsAssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index(Team $id)
    {
//        dd($id->assignments[0]->team);
        $assignments = $id->assignments;
        return view('pages.Teams.Assignments.assignments', compact('assignments', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create(Team $id)
    {
        if (auth()->id() != $id->manager->id) {
            abort(401);
        }
        return view('pages.Teams.Assignments.new', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
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
                Mail::to($member->email)
                    ->send(new TeamAssignmentsEmail(
                            $id->name,
                            url('teams/' . $id->id . '/assignments/Member-Assignment/' . $ass->id),
                            $ass->ending_date->diffForHumans()
                        )
                    );
            }
            return redirect()->route('teams.assignments.index', $id->id)->with('success', 'Assignment Created Successfully');
        } catch (\Exception $e) {
            return redirect()->route('teams.assignments.new', $id->id)->with('toast_error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View|Response
     */
    public function show(Team $id, Assignment $assignment)
    {
        $user = $assignment->users;
        return view('pages.Teams.Assignments.assignment_for_member', compact('assignment', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy( Team $id, Assignment $assignment)
    {

        try {
            $assignment->delete();
            return redirect()->route('teams.assignments.index', [$id->id])->with('success', 'Assignment '.$assignment->name . " Deleted Successfully");
        } catch (\Exception $e) {
            return  redirect()->route('teams.assignments.index', [$id->id])->with('toast_error', $e->getMessage());
        }
    }
}
