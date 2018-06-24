<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Request;

class RequestConsidered extends Mailable
{
    use Queueable, SerializesModels;

    public $request;

    public $decision;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request, $decision)
    {
        $this->request = $request;
        $this->decision = $decision;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.request-decision');
    }
}
