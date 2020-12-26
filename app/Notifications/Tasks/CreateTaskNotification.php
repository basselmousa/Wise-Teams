<?php

namespace App\Notifications\Tasks;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreateTaskNotification extends Notification
{
    use Queueable;

    private $team;
    private $manager;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($team, $manager)
    {
        //
        $this->team = $team;
        $this->manager = $manager;
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
            ->subject('Create Task')
            ->markdown('emails.tasks.create_task', [
                'team' => $this->team,
                'manager' => $this->manager
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
            'team_name' => $this->team,
            'created_by' => $this->manager
        ];
    }
}
