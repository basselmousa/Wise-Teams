<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendNewPost implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $userid;
    public $gender;
    public $username;
    public $avatar;
    public $content;
    public $date;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($userid,$gender,$name,$avatar,$content,$date)
    {
        $this->userid=$userid;
        $this->gender=$gender;
        $this->username=$name;
        $this->avatar=$avatar;
        $this->content=$content;
        $this->date=$date;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('WiseTeams');
    }
}
