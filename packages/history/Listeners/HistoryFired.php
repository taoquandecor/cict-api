<?php

namespace History\Listeners;

use History\Events\HistoryEvent;
use History\Repos\HistoryRepo;
use Illuminate\Support\Facades\Log;

class HistoryFired
{
    protected $history, $detail;

    /**
     * Create the event listener.
     * @param HistoryRepo       $history
     */
    public function __construct(HistoryRepo $history)
    {
        $this->history = $history;
    }

    /**
     * Handle the event.
     *
     * @param HistoryEvent $event
     * @return void
     */
    public function handle(HistoryEvent $event)
    {
        try {
            $this->history->Insert($event->history);
        } catch (\Exception $e) {
            Log::info("History Fired Error: " . json_encode($e));
        }
    }
}
