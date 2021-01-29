<?php

namespace App\Http\Controllers\Teams\Assignments;

use App\Http\Controllers\Controller;
use App\Http\Requests\GradeUserAssignmentRequest;
use App\Models\Assignment;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PhpParser\Node\Expr\Cast\Int_;

class UploadedAssignmentsController extends Controller
{
    /**
     *Show Uploaded Files For Specific Assignment
     */
    public function index(Team $id, Assignment $assignments)
    {
        if ($id->manager_id != auth()->id() | $assignments->team_id != $id->id ) {
            abort(401);
        }

        return view('pages.Teams.Assignments.uploaded_assignments', compact('id', 'assignments'));
    }

    /**
     * Download Assignment File
     */
    public function download(Team $id, Assignment $assignments, Request $request)
    {
        $file = Str::after($request->file_path, '.');
        try {
            return Storage::download('public/' . $request->file_path, $request->file_name . "." . $file);
        } catch (\Exception $exception) {
//            dd($exception->getCode());
            if ($exception->getCode() == 0) {
                return Storage::download($request->file_path, $request->file_name . "." . $file);
            } else {
                return $exception;
            }
        }
    }

    /**
     * Garde User Assignment
     */
    public function grade(Team $id, Assignment $assignments, GradeUserAssignmentRequest $request)
    {
//        dd($assignments->points);
        try {
            if ((int)$request->grade > $assignments->points) {
                throw new \Exception("The Grade Is Greater Than Assignment Point");
            } else {
                foreach ($assignments->users as $user){
                    if ($user->id == $request->user_id){
                        $user->pivot->grade = $request->grade;
                        $user->pivot->update();
                    }
                }
                return redirect()->route('teams.assignments.uploaded.showUploads', [$id->id, $assignments->id])->with('toast_success', "User Graded");
            }
        } catch (\Exception $exception) {
            return redirect()->route('teams.assignments.uploaded.showUploads', [$id->id, $assignments->id])->with('toast_error', $exception->getMessage());
        }
    }
}
