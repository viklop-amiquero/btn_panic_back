<?php

namespace App\shared\services\business;

use App\Events\ReporteCreadoEvent;
use App\Models\business\Reporte;
use Illuminate\Support\Facades\Auth;
use App\shared\Traits\AuthorizesUser;
use App\Http\Resources\business\ReporteCollection;
use App\Http\Resources\business\ReporteShowResource;
use App\shared\Traits\AuthorizesCliente;

class ReporteService
{

    protected $user;
    use AuthorizesCliente, AuthorizesUser;

    public function __construct()
    {
        $this->user = Auth::user();
    }

    public function list()
    {
        // $this->authorizeUser();
        $user = Auth::user();

        if (!$this->user->isUser()) {
            // Cliente
            return new ReporteCollection(
                Reporte::where('cliente_id', $user->id)->orderBy('created_at', 'DESC')
                    ->paginate(20)
            );
        }


        return new ReporteCollection(
            Reporte::paginate(10)
        );
    }

    public function create(array $data, $imagen = null)
    {

        $this->authorizeCliente();

        $pathImage = $imagen ? $imagen->store('reportes', 'public') : null;

        $reporte = Reporte::create([
            'imagen' => $pathImage,
            'descripcion' => $data['descripcion'],
            'direccion' => $data['direccion'],
            'categoria_id' => $data['categoria_id'],
            'latitud' => $data['latitud'],
            'longitud' => $data['longitud'],
            'cliente_id' => $this->user->id,
            'created_at' => now(),
        ]);

        broadcast(new ReporteCreadoEvent($reporte))->toOthers();


        return response()->json([
            "message" => "El reporte ha sido enviado exitosamente."
        ]);
    }

    public function show(Reporte $reporte)
    {
        $this->authorizeUser();

        return new ReporteShowResource($reporte);
        // return $reporte;
    }

    public function update(int $id)
    {
        $this->authorizeUser();

        $reporte = Reporte::find($id);

        if (!$reporte) {
            return response()->json([
                'message' => 'Reporte no encontrado.'
            ], 404);
        }

        $reporte->estado = '2';
        $reporte->usuario_modifica = Auth::user()->id;
        $reporte->save();

        return response()->json([
            'message' => 'Reporte actualizado correctamente.'
        ]);
    }

    public function delete($id)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json([
                'message' => 'No autenticado.'
            ], 401);
        }

        // Si es cliente, buscar por cliente_id
        $query = Reporte::query();

        if (!$user->isUser()) {
            $query->where('cliente_id', $user->id);
        }

        $reporte = $query->where('id', $id)->first();

        if (!$reporte) {
            return response()->json([
                'message' => 'Reporte no encontrado.'
            ], 404);
        }

        $reporte->estado = '0';
        $reporte->save();

        return response()->json([
            'message' => 'Reporte eliminado exitosamente.'
        ]);
    }


    // public function delete($id)
    // {
    //     //



    //     // Es un cliente
    //     $user = Auth::user();

    //     if (!$user || !$user->isUser()) {
    //         $reporte = Reporte::where('id', $id)
    //             ->where('cliente_id', $this->user->id)
    //             ->first();


    //         if (!$reporte) {
    //             return response()->json([
    //                 'message' => 'Reporte no encontrado'
    //             ], 404);
    //         }

    //         $reporte->estado = '0';
    //         $reporte->save();

    //         return response()->json(
    //             [
    //                 'message' => 'Reporte eliminado exitosamente.'
    //             ]
    //         );
    //     }


    //     // Es un usuario
    //     if ($user->isUser()) {

    //         $reporte = Reporte::find($id);

    //         if (!$reporte) {
    //             return response()->json([
    //                 'message' => 'Reporte no encontrado.'
    //             ], 404);
    //         }

    //         $reporte->estado = '0';
    //         $reporte->save();

    //         return response()->json(
    //             [
    //                 'message' => 'Reporte eliminado exitosamente.'
    //             ]
    //         );
    //     }
    // }
}
