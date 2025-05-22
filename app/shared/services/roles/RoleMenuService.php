<?php

namespace App\shared\services\roles;

use App\Models\roles\Role;
use App\Models\security\User;
use App\Models\roles\RoleMenu;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\roles\RoleMenuCollection;
use App\Http\Resources\roles\RolMenuShowCollection;
use App\shared\Traits\AuthorizesUser;

class RoleMenuService
{

    use AuthorizesUser;

    public function list()
    {
        $this->authorizeUser();
        return new RoleMenuCollection(RoleMenu::where('estado', '1')->get());
    }

    public function create(array $data)
    {
        $this->authorizeUser();

        $userId = Auth::id();

        $rol = Role::create([
            'nombre' => strtoupper($data['nombre']),
            'descripcion' => $data['descripcion'],
            'usuario_crea' => $userId,
        ]);

        foreach ($data['permisos'] as $permiso) {
            RoleMenu::create([
                'role_id' => $rol->id,
                'menu_id' => $permiso['menu_id'],
                'permiso_id' => $permiso['permiso_id'],
                'usuario_crea' => $userId,
            ]);
        }

        return response()->json(['message' => 'Rol creado exitosamente']);
    }

    public function show($id)
    {
        $this->authorizeUser();

        $roleMenu = RoleMenu::where('role_id', $id)->where('estado', '1')->get();
        if ($roleMenu->isEmpty()) {
            return response()->json(['message' => 'Rol no encontrado.'], 404);
        }

        return new RolMenuShowCollection($roleMenu);
    }

    public function update($id, array $data)
    {
        $this->authorizeUser();
        $rol = Role::find($id);
        if (!$rol) {
            return response()->json(['message' => 'Rol no encontrado.'], 404);
        }

        $rol->update([
            'nombre' => strtoupper($data['nombre']),
            'descripcion' => $data['descripcion'],
            'usuario_modifica' => Auth::id()
        ]);

        RoleMenu::where('role_id', $id)->delete();

        foreach ($data['permisos'] as $permiso) {
            RoleMenu::create([
                'role_id' => $id,
                'menu_id' => $permiso['menu_id'],
                'permiso_id' => $permiso['permiso_id'],
                'usuario_crea' => Auth::id(),
            ]);
        }

        return response()->json(['message' => 'Rol actualizado exitosamente.']);
    }

    public function delete($id)
    {
        $this->authorizeUser();

        $role = Role::find($id);
        if (!$role) {
            return response()->json(['message' => 'Rol no encontrado.'], 404);
        }

        $role->update([
            'estado' => '0',
            'usuario_modifica' => Auth::id(),
        ]);

        RoleMenu::where('role_id', $id)->where('estado', '1')->update([
            'estado' => '0',
            'usuario_modifica' => Auth::id(),
        ]);

        User::where('role_id', $id)->where('estado', '1')->update([
            'estado' => '0',
            'usuario_modifica' => Auth::id(),
        ]);

        return response()->json(['message' => 'Rol eliminado correctamente.']);
    }
}
