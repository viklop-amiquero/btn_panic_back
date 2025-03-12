<?php

namespace App\Http\Controllers\business;

use App\Http\Controllers\Controller;
use App\Http\Requests\business\CategoriaRequest;
use App\Http\Resources\business\CategoriaCollection;
use App\Models\business\Categoria;
use App\Models\security\Cliente;
use App\Models\security\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return new CategoriaCollection(Categoria::where('estado', '1')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriaRequest $request)
    {
        //
        $data = $request->validated();

        $categoria = Categoria::create([
            'nombre' => strtoupper($data['nombre']),
            'descripcion' => strtoupper($data['descripcion']),
            'usuario_crea' => Auth::user()->id,
            'created_at' => now()
        ]);

        return response()->json([
            'message' => 'Categoría creado exitosamente.'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriaRequest $request, $id)
    {
        //
        $categoria = Categoria::find($id);

        if (!$categoria) {
            return response()->json(['message' => 'Categoría no encontrada'], 404);
        }

        $data = $request->validated();

        $data['nombre'] = strtoupper($data['nombre']);
        $data['descripcion'] = strtoupper($data['descripcion']);
        $data['usuario_modifica'] = Auth::user()->id;

        $categoria->update($data);

        return response()->json([
            'message' => 'Categoria actualizado exitosamente.',
            'categoria' => $categoria
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $categoria = Categoria::find($id);

        if (!$categoria) {
            return response()->json([
                'message' => 'Categoría no encontrada'
            ], 404);
        }

        $categoria->estado = '0';
        $categoria->save();

        return response()->json(['message' => 'Categoría eliminada exitosamente.']);
    }
}
