<?php

namespace History\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class HistoryEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $history;

    /**
     * Create a new event instance.
     * @param array $history
     */
    public function __construct(array $history)
    {
        $this->history = $history;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return [];
    }
}
