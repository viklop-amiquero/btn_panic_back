<?php

namespace App\Http\Controllers\business;

use Illuminate\Http\Request;
use App\Models\security\User;
use App\Models\business\Reporte;
use App\Models\security\Cliente;
use App\Models\business\Categoria;
use App\Http\Controllers\Controller;
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

        // return $user->isCliente();

        if (!$user->isUser()) {
            // Cliente
            return new ReporteCollection(Reporte::where('cliente_id', $user->id)->get());
        }

        // return 'es un usuario';

        return new ReporteCollection(Reporte::all());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
