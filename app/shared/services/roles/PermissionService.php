<?php

namespace App\shared\services\roles;

use App\Models\roles\Menu;
use App\Models\security\User;
use App\Models\roles\RoleMenu;

class PermissionService
{
    public static  function userHasPermission(User $user, string $menuKey, string $action): bool
    {
        $menu =     Menu::where('clave', $menuKey)->first();

        if (!$menu) return false;

        $roleMenu = RoleMenu::where('role_id', $user->role_id)
            ->where('menu_id', $menu->id)
            ->with('permiso')
            ->first();

        if (!$roleMenu || !$roleMenu->permiso) return false;

        $permiso = $roleMenu->permiso;

        return match ($action) {
            'create' => $permiso->create ?? false,
            'read' => $permiso->read ?? false,
            'update' => $permiso->update ?? false,
            'delete' => $permiso->delete ?? false,
            default => false,
        };
    }
}
