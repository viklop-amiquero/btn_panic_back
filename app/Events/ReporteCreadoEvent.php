<?php

namespace App\Events;

use App\Models\business\Reporte;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ReporteCreadoEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */

    public $reporte;

    public function __construct(Reporte $reporte)
    {
        //
        $this->reporte = $reporte;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    // public function broadcastOn()
    // {
    //     new PrivateChannel('reportes');
    // return [
    //     new PrivateChannel('reportes'),
    // ];
    // }
    public function broadcastOn()
    {

        return [new PrivateChannel('reportes')];
    }

    public function broadcastAs(): string
    {
        return 'reporte.creado';
    }

    // public function broadcastOn()
    // {
    //     return new Channel('reportes');
    // }
}
