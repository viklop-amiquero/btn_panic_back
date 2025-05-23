<?php

namespace App\shared\services\business;

use App\Models\business\Reporte;
use Illuminate\Support\Facades\Auth;
use App\shared\Traits\AuthorizesUser;
use App\Http\Resources\business\ReporteCollection;
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
                    ->paginate(10)
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


        return response()->json([
            "message" => "El reporte ha sido enviado exitosamente."
        ]);
    }

    public function show() {}

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
        //
        // $this->authorizeCliente();

        $reporte = Reporte::where('id', $id)
            ->where('cliente_id', $this->user->id)
            ->first();

        if (!$reporte) {
            return response()->json([
                'message' => 'Operación no permitida.'
            ], 404);
        }

        $reporte->estado = '0';
        $reporte->save();

        return response()->json(
            [
                'message' => 'Reporte eliminado exitosamente.'
            ]
        );
    }
}
