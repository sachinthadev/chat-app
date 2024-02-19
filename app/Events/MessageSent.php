<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    use SerializesModels;

    /**
     * Create a new event instance.
     */

     public $message;
     public $recipient;
 
     public function __construct($message, $recipient)
     {
         $this->message = $message;
         $this->recipient = $recipient;
     }
 
     public function broadcastOn()
     {
         return new PrivateChannel('chat.' . $this->recipient);
     }



   
}


