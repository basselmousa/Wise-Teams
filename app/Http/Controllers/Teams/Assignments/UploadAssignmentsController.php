<?php

namespace App\Http\Controllers\Teams\Assignments;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamsAssignments\UploadAssignmentRequest;
use App\Mail\TeamAssignments\AssignmentUploadedEmail;
use App\Models\Assignment;
use App\Models\Team;
use App\Models\User;
use App\Notifications\AssignmentUploadedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class UploadAssignmentsController extends Controller
{


    public function getImagePath($img)
    {
        if ($img) {
            return $img->store('assignmentsFile', 'public');
        }
        return null;
    }

    public function store(UploadAssignmentRequest $request,Team $id , Assignment $assignment)
    {
        $user = User::find(auth()->id());
        $file_path = $this->getImagePath($request->file('assignment'));

        try {

            $assignment->users()->save($user, [
                'file_path' => $file_path,
                'status' => 1
            ]);
//            auth()->user()->notify(new AssignmentUploadedNotification());
            $id->manager->notify(new AssignmentUploadedNotification(auth()->user()->username,$assignment->name ,$id->id ,$assignment->id));
//            Notification::send(->email, new AssignmentUploadedNotification());
//            Mail::to($id->manager->email)
//                ->send(new AssignmentUploadedEmail(auth()->user()->username, $assignment->name, $assignment->id, $id->id));
            return redirect()->route('teams.assignments.show', [$id->id, $assignment->id])->with('success', 'Your File Was Uploaded');
        }catch (\Exception $exception){
            if ($exception->getCode() == 23000){
                return redirect()->route('teams.assignments.show', [$id->id, $assignment->id])->with('toast_error', "You are uploaded A File To This Assignment");
            }
            else{
                return redirect()->route('teams.assignments.show', [$id->id, $assignment->id])->with('toast_error', "Error With Code " . $exception->getMessage());
            }
        }
    }
}
