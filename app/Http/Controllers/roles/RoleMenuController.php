<?php

namespace App\Http\Controllers\roles;

use App\Http\Controllers\Controller;
use App\Http\Requests\rol\RolMenuRequest;
use App\Http\Resources\roles\RoleMenuCollection;
use App\Http\Resources\roles\RolMenuShowCollection;
use App\Models\roles\Role;
use App\Models\roles\RoleMenu;
use App\Models\security\User;
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

        return new RoleMenuCollection(RoleMenu::where('estado', '1')->get());
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

        $roleMenu = RoleMenu::where('role_Id', $id)->where('estado', '1')->get();

        if ($roleMenu->isEmpty()) {
            return response()->json(['message' => 'Rol no encontrado.'], 404);
        }

        return new RolMenuShowCollection($roleMenu);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RolMenuRequest $request, $id)
    {
        $user = Auth::user();

        if (!$user->isUser()) {
            return response()->json([
                'message' => 'Acción no permitida.'
            ], 403);
        }

        $data = $request->validated();

        $rol = Role::find($id);

        if (!$rol) {
            return response()->json(['message' => 'Rol no encontrado.'], 404);
        }

        // Actualizar datos del rol
        $rol->nombre = strtoupper($data['nombre']);
        $rol->descripcion = $data['descripcion'];
        $rol->usuario_modifica = $user->id;
        $rol->save();

        // Eliminar roles-permisos anteriores
        RoleMenu::where('role_id', $rol->id)->delete();

        // Crear nuevas relaciones
        foreach ($data['permisos'] as $permiso) {
            RoleMenu::create([
                'role_id' => $rol->id,
                'menu_id' => $permiso['menu_id'],
                'permiso_id' => $permiso['permiso_id'],
                'usuario_crea' => $user->id,
            ]);
        }

        return response()->json(['message' => 'Rol actualizado exitosamente.']);
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
        $authUser = Auth::user();

        if (!$authUser->isUser()) {
            return response()->json(['message' => 'Acción no permitida.'], 403);
        }

        $role = Role::find($id);

        if (!$role) {
            return response()->json(['message' => 'Rol no encontrado.'], 404);
        }

        // Desactivar el rol
        $role->estado = '0';
        $role->usuario_modifica = $authUser->id;
        $role->save();

        // Desactivar los permisos asociados al rol
        RoleMenu::where('role_id', $id)
            ->where('estado', '1')
            ->update([
                'estado' => '0',
                'usuario_modifica' => $authUser->id
            ]);

        // Desactivar usuarios con ese rol
        $users = User::where('role_id', $id)
            ->where('estado', '1')
            ->get();

        foreach ($users as $user) {
            $user->estado = '0';
            $user->usuario_modifica = $authUser->id;
            $user->save();
        }

        return response()->json(['message' => 'Rol eliminado correctamente.']);
    }


    // public function destroy($id)
    // {
    //     //
    //     $user = Auth::user();

    //     if (!$user->isUser()) {
    //         // cliente
    //         return response()->json([
    //             'message' => 'Acción no permitida.'
    //         ], 403);
    //         // return;
    //     }

    //     $role = Role::find($id);

    //     if (!$role) {
    //         return response()->json(['message' => 'Rol no encontrado.'], 404);
    //     }

    //     $roleMenus = RoleMenu::where('role_Id', $id)->where('estado', '1')->get();
    //     if ($roleMenus->isEmpty()) {
    //         return response()->json(['message' => 'Rol no encontrado.'], 404);
    //     }

    //     $role->usuario_modifica = Auth::user()->id;


    //     $role->estado = '0';
    //     $role->save();

    //     foreach ($roleMenus as $roleMenu) {
    //         $roleMenu['estado'] = '0';
    //         $roleMenu['usuario_modifica'] = Auth::user()->id;

    //         $roleMenu->save();
    //     }


    //     $users = User::where('role_id', $id)->where('estado', '1')->get();

    //     if ($users->isEmpty()) {
    //         return response()->json(['message' => 'Usuario no encontrado'], 404);
    //     }

    //     foreach ($users as $user) {
    //         $user['estado'] = '0';
    //         $user['usuario_modifica'] = Auth::user()->id;

    //         $user->save();
    //     }

    //     return response()->json(['message' => 'Rol eliminado.']);
    // }
}
