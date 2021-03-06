<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Request;

class RequestConsidered
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $request;
    public $decision;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Request $request, $decision)
    {
        $this->request = $request;
        $this->decision = $decision;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
