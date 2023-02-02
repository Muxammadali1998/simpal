<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class On implements ShouldBroadcast
{
  use Dispatchable, InteractsWithSockets, SerializesModels;

  public $message;

  public function __construct()
  {
    //   $this->message = $message;
  }

  public function broadcastOn()
  {
      return ['on'];
  }

  public function broadcastAs()
  {
      return 'my-event';
  }
}