<?php

namespace App\Http\Controllers\roles;

use App\Http\Controllers\Controller;
use App\Http\Requests\rol\RolRequest;
use App\Http\Resources\roles\RoleCollection;
use App\Models\roles\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = Auth::user();

        if (!$user->isUser()) {
            // cliente
            return response()->json([
                'message' => 'Acción no permitida.'
            ], 403);
            // return;
        }

        return new RoleCollection(Role::where('estado', '1')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RolRequest $request)
    {
        //
        $user = Auth::user();

        if (!$user->isUser()) {
            // cliente
            return response()->json([
                'message' => 'Acción no permitida.'
            ], 403);
            // return;
        }

        $data = $request->validated();

        $role = Role::create([
            'nombre' => strtoupper($data['nombre']),
            'descripcion' => strtoupper($data['descripcion']),
            'usuario_crea' => Auth::user()->id,
            'created_at' => now()
        ]);

        return response()->json([
            'message' => 'Rol creado exitosamente.'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RolRequest $request,  $id)
    {
        //
        $user = Auth::user();

        if (!$user->isUser()) {
            // cliente
            return response()->json([
                'message' => 'Acción no permitida.'
            ], 403);
            // return;
        }

        $rol = Role::find($id);

        if (!$rol) {
            return response()->json(['message' => 'Rol no encontrado.'], 404);
        }

        $data = $request->validated();

        $data['nombre'] = strtoupper($data['nombre']);
        $data['descripcion'] = strtoupper($data['descripcion']);
        $data['usuario_modifica'] = Auth::user()->id;

        $rol->update($data);

        return response()->json([
            'message' => 'Categoria actualizado exitosamente.',
            'categoria' => $rol
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $user = Auth::user();

        if (!$user->isUser()) {
            // cliente
            return response()->json([
                'message' => 'Acción no permitida.'
            ], 403);
            // return;
        }

        $rol = Role::find($id);
        if (!$rol) {
            return response()->json(['message' => 'Rol no encontrado.'], 404);
        }

        $rol->estado = '0';
        $rol->usuario_modifica = Auth::user()->id;
        $rol->updated_at = now();

        $rol->save();
    }
}
