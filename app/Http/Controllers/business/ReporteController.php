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
                Reporte::where('cliente_id', $user->id)
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
            return;
        }

        $data = $request->validated();

        if (!$data['imagen']) {
            $reporte = Reporte::create([
                'descripcion' => $data['descripcion'],
                'direccion' => $data['direccion'],
                'categoria_id' => $data['categoria_id'],
                'cliente_id' => $data['cliente_id'],
                'created_at' => now(),
            ]);

            return response()->json([
                "message" => "El reporte fue creado exitosamente."
            ]);
        }

        $reporte = Reporte::create([
            'imagen' => $data['imagen'],
            'descripcion' => $data['descripcion'],
            'direccion' => $data['direccion'],
            'categoria_id' => $data['categoria_id'],
            'cliente_id' => $data['cliente_id'],
            'created_at' => now(),
        ]);


        return response()->json([
            "message" => "El reporte fue creado exitosamente."
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
            return;
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
    public function destroy(Reporte $reporte)
    {
        //


    }
}
