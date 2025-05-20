<?php

namespace App\Http\Controllers\roles;

use App\Http\Controllers\Controller;
use App\Http\Requests\rol\RolMenuRequest;
use App\Http\Resources\roles\RoleMenuCollection;
use App\Http\Resources\roles\RolMenuShowCollection;
use App\Models\roles\Role;
use App\Models\roles\RoleMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMenuController extends Controller
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

        return new RoleMenuCollection(RoleMenu::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RolMenuRequest $request)
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

        $rol = Role::create([
            'nombre' => strtoupper($data['nombre']),
            'descripcion' => $data['descripcion'],
            'usuario_crea' => auth()->user()->id,
        ]);

        foreach ($data['permisos'] as $permiso) {
            RoleMenu::create([
                'role_id' => $rol->id,
                'menu_id' => $permiso['menu_id'],
                'permiso_id' => $permiso['permiso_id'],
                'usuario_crea' => auth()->user()->id,
            ]);
        }

        return response()->json(['message' => 'Rol creado exitosamente']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
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

        $roleMenu = RoleMenu::where('role_Id', $id)->get();

        if ($roleMenu->isEmpty()) {
            return response()->json(['message' => 'Rol no encontrado.'], 404);
        }

        return new RolMenuShowCollection($roleMenu);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RoleMenu $roleMenu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RoleMenu $roleMenu)
    {
        //
    }
}
