<?php

namespace App\Listeners;

use App\Events\RequestConsidered;
use App\Mail\RequestConsidered as MailOnRequest;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class InformOnDecision
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
     * @param  RequestConsidered  $event
     * @return void
     */
    public function handle(RequestConsidered $event)
    {
        \Mail::to($event->request->users->email)->send(new MailOnRequest($event->request, $event->decision));
    }
}
