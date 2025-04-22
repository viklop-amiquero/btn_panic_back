<?php

namespace App\Http\Controllers\business;

use Illuminate\Http\Request;
use App\Models\business\Reporte;
use App\Http\Controllers\Controller;
use App\Http\Requests\business\ReporteRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\business\ReporteCollection;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        if (!$user->isUser()) {
            // Cliente
            return new ReporteCollection(
                Reporte::where('cliente_id', $user->id)->orderBy('created_at', 'DESC')
                    ->paginate(10)
            );
        }

        // Usuario;

        return new ReporteCollection(
            Reporte::paginate(10)
        );
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ReporteRequest $request)
    {
        //
        $user = Auth::user();

        if ($user->isUser()) {
            // usuario
            return response()->json([
                'message' => 'Usuario no permitida.'
            ], 403);
            // return;
        }

        // return response()->json([
        //     "usuario" => $user->id
        // ]);


        // if (!$data['imagen']) {
        //     $reporte = Reporte::create([
        //         'descripcion' => $data['descripcion'],
        //         'direccion' => $data['direccion'],
        //         'categoria_id' => $data['categoria_id'],
        //         // 'cliente_id' => $data['cliente_id'],
        //         'cliente_id' => $user->id,
        //         'latitud' => $data['latitud'],
        //         'longitud' => $data['longitud'],
        //         'created_at' => now(),
        //     ]);

        //     return response()->json([
        //         "message" => "El reporte ha sido enviado exitosamente."
        //     ]);
        // }

        $data = $request->validated();

        $path_image = null;

        if ($request->hasfile('imagen')) {
            $path_image = $request->file('imagen')->store('reportes', 'public');
        }

        $reporte = Reporte::create([
            'imagen' => $path_image,
            'descripcion' => $data['descripcion'],
            'direccion' => $data['direccion'],
            'categoria_id' => $data['categoria_id'],
            'latitud' => $data['latitud'],
            'longitud' => $data['longitud'],
            'cliente_id' => $user->id,
            'created_at' => now(),
        ]);


        return response()->json([
            "message" => "El reporte ha sido enviado exitosamente."
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reporte $reporte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $user = Auth::user();

        if (!$user->isUser()) {
            // Cliente
            return response()->json([
                'message' => 'Cliente no permitida.'
            ], 403);
            // return;
        }

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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $user = Auth::user();

        if ($user->isUser()) {
            // usuario
            return response()->json([
                'message' => 'Usuario no permitido.'
            ], 403);
        }

        $reporte = Reporte::where('id', $id)
            ->where('cliente_id', $user->id)
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
