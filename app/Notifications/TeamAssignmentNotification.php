<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TeamAssignmentNotification extends Notification
{
    use Queueable;

    private $name;
    private $url;
    private $duration;
    private $username;

    /**
     * Create a new notification instance.
     *
     * @param $duration
     * @param $name
     * @param $url
     */
    public function __construct( $name,$url,$duration, $username)
    {
        $this->name = $name;
        $this->url = $url;
        $this->duration = $duration;
        $this->username = $username;
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
            ->subject('Assignment Created')
            ->markdown('emails.team_assignment.assignment_created', [
                'url' => $this->url,
                'name' => $this->name,
                'duration' => $this->duration
            ]);
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
            'team' => $this->name,
            'username' => $this->username,
        ];
    }
}
