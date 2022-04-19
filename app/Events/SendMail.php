<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SendMail
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;

    public $template;

    public $subject;

    /**
     * Create a new event instance.
     *
     * @param $user
     * @param $subject
     * @param string $template
     */
    public function __construct($user, $subject, $template = "emails.people")
    {
        $this->user = $user;
        $this->template = $template;
        $this->subject = $subject;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return [];
    }
}
