<?php

namespace App\shared\services\roles;

use App\Models\roles\Menu;
use App\Models\security\User;
use App\Models\roles\RoleMenu;

class PermissionService
{
    // public static  function userHasPermission(User $user, string $menuKey, string $action): bool
    public static  function userHasPermission(User $user, string $menuKey, string $action)
    {

        $menu = Menu::where('clave', $menuKey)->first();
        if (!$menu) return false;

        $roleMenu = RoleMenu::where('role_id', $user->role_id)
            ->where('menu_id', $menu->id)
            ->with('permiso')
            ->first();


        // RoleMenu id 3

        if (!$roleMenu || !$roleMenu->permiso) return false;

        $permiso = $roleMenu->permiso_id;

        // Permiso id: 1, todos los permisos

        return match ($action) {
            'create' => $permiso === 2 ? false : true,
            'read' => $permiso === 5 ? false : true,
            'update' => $permiso !== 4 && $permiso !== 1 ? false : true,
            'delete' => $permiso !== 4 ? true : false,
            default => false,
        };
    }
}
