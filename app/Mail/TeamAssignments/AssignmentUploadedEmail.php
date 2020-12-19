<?php

namespace App\Mail\TeamAssignments;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AssignmentUploadedEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $username;
    public $assignment;
    public $url;

    /**
     * Create a new message instance.
     *
     * @param $username
     * @param $assignment
     * @param $url
     * @param $assignmentID
     * @param $teamID
     */
    public function __construct($username, $assignment,$assignmentID, $teamID)
    {
        //
        $this->username = $username;
        $this->assignment = $assignment;
        $this->url = route('teams.assignments.uploaded.showUploads', [$teamID, $assignmentID]);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.team_assignment.assignment_uploaded');
    }
}
