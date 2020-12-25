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
    public $user_id;
    public $gender;
    public $fullname;
    public $avatar;
    public $content;
    public $created_at;
    public $teamid;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user_id,$gender,$name,$avatar,$content,$date,$teamid)
    {
        $this->user_id=$user_id;
        $this->gender=$gender;
        $this->fullname=$name;
        $this->avatar=$avatar;
        $this->content=$content;
        $this->created_at=$date;
        $this->teamid=$teamid;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('SendNewPost.'.$this->teamid);
    }
}
