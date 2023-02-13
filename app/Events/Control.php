<?php
namespace App\Events;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class Control implements ShouldBroadcast
{
  use Dispatchable, InteractsWithSockets, SerializesModels;

  public $data;

  public function __construct($data)
  {
      $this->data = $data;
  }

  public function broadcastOn()
  {
      return new Channel('channel');
  }
  public function broadcastAs()
  {
      return 'Control';
  }
}