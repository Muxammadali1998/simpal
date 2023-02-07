<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;

class On implements ShouldBroadcast
{
  use Dispatchable, InteractsWithSockets, SerializesModels;

  public $status;

  public function __construct()
  {
    //   $this->message = $message;
  }

  public function broadcastOn()
  {
    return new Channel('test');
  }

  public function broadcastAs()
  {
      return 'test';
  }
}