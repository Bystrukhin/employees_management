<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class UserAdded extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public $code;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $code)
    {
        $this->user = $user;
        $this->code = $code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.credentials');
    }
}
