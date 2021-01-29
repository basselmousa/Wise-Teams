<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MeetingStartingNotification extends Notification
{
    use Queueable;

    private $userFullName;
    private $teamName;
    private $manager;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($userFullName, $teamName, $manager)
    {

        $this->userFullName = $userFullName;
        $this->teamName = $teamName;
        $this->manager = $manager;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)->markdown('emails.meeting.meetingstart', [
            'userFullName' => $this->userFullName,
            'teamName' => $this->teamName,
        ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'username' => $this->userFullName,
            'team' => $this->teamName,
            'manager' => $this->manager
        ];
    }
}
