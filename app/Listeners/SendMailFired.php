<?php

namespace App\Listeners;

use App\Events\SendMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendMailFired
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SendMail  $event
     * @return void
     */
    public function handle(SendMail $event)
    {
        Mail::send($event->template,
            ['username' => $event->user->Code, 'password' => $event->user->PasswordOriginal, 'application' => ''],
            function($message) use ($event) {
            $message->to($event->user->Email);
            $message->subject($event->subject);
        });
    }
}
