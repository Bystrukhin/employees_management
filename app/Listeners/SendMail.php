<?php

namespace App\Listeners;

use App\Events\UserAddedEvent;
use App\Mail\UserAdded;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail
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
     * @param  UserAddedEvent  $event
     * @return void
     */
    public function handle(UserAddedEvent $event)
    {
        \Mail::to($event->user)->send(new UserAdded($event->user, $event->code));
    }
}
