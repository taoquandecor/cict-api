<?php

namespace History\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use History\Events\HistoryEvent;
use History\Listeners\HistoryFired;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        HistoryEvent::class => [
            HistoryFired::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
