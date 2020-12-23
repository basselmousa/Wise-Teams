<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AssignmentUploadedNotification extends Notification
{
    use Queueable;

    /**
     * @var string
     */
    private $url;
    private $assignment;
    private $username;

    /**
     * Create a new notification instance.
     *
     * @param $username
     * @param $assignment
     * @param $teamID
     * @param $assignmentID
     */
    public function __construct($username, $assignment, $teamID, $assignmentID)
    {
        $this->username = $username;
        $this->assignment = $assignment;
        $this->url = route('teams.assignments.uploaded.showUploads', [$teamID, $assignmentID]);

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Assignment Uploaded')
            ->markdown('emails.team_assignment.assignment_uploaded', ['url' => $this->url, 'username' => $this->username, 'assignment' => $this->assignment]);

    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'username' => $this->username,
            'assignment' => $this->assignment,

        ];
    }
}
