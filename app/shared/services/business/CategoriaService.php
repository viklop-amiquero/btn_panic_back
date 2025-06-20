<?php

namespace App\shared\services\business;

use App\Models\business\Categoria;
use App\Http\Resources\business\CategoriaCollection;
use App\Http\Resources\business\CategoriaResource;
use App\shared\Traits\AuthorizesUser;
use Illuminate\Support\Facades\Auth;


class CategoriaService
{
    use AuthorizesUser;

    public function list()
    {
        $categorias = Categoria::where('estado', '1')->orderBy('created_at', 'DESC')->paginate(10); // 10 por página
        return new CategoriaCollection($categorias);
    }


    public function create(array $data)
    {

        //
        $this->authorizeUser();

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

    public function show($id)
    {
        $this->authorizeUser();

        $categoria = Categoria::find($id);

        if (!$categoria) {

            return response()->json([
                'message' => 'Categoría no encontrado.'
            ], 404);
        }


        return new CategoriaResource($categoria);
    }

    public function update(array $data, $id)
    {
        $this->authorizeUser();

        $categoria = Categoria::find($id);

        if (!$categoria) {
            return response()->json(['message' => 'Categoría no encontrada.'], 404);
        }

        $data['nombre'] = strtoupper($data['nombre']);
        $data['descripcion'] = strtoupper($data['descripcion']);
        $data['usuario_modifica'] = Auth::user()->id;

        $categoria->update($data);

        return response()->json([
            'message' => 'Categoria actualizado exitosamente.',
            'categoria' => $categoria
        ]);
    }

    public function delete($id)
    {
        $this->authorizeUser();

        $categoria = Categoria::find($id);

        if (!$categoria) {
            return response()->json([
                'message' => 'Categoría no encontrada'
            ], 404);
        }

        $categoria->estado = '0';
        $categoria->usuario_modifica = Auth::user()->id;
        $categoria->updated_at = now();
        $categoria->save();

        return response()->json(['message' => 'Categoría eliminada exitosamente.']);
    }
}
