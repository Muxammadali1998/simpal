<?php

namespace App\Events;

use App\Models\Site\Obyekt;
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

    new Channel('test');
  }

  public function broadcastOn()
  {
    $post = Obyekt::orderBy('updated_at', 'DESC')->first();
    $post->status = 9;
    $post->save();
    return new Channel('test');
  }

  public function broadcastAs()
  {
      return 'test';
  }
}