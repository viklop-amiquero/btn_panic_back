<?php

namespace App\Events;

use App\Models\business\Reporte;
use App\Models\security\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use App\shared\services\roles\PermissionService;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Support\Facades\Auth;


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
        return new PrivateChannel('reportes');
    }

    // public function broadcastOn()
    // {
    //     Log::info('🛰️ BroadcastOn ejecutado. Enviando al canal público reportes');
    //     return new Channel('reportes');
    // }


    public function broadcastAs(): string
    {
        return 'reporte.creado';
    }

    // public function broadcastOn()
    // {
    //     return new Channel('reportes');
    // }
}
