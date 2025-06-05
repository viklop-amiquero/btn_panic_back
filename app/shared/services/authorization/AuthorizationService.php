<?php

namespace App\shared\services\authorization;

use Illuminate\Support\Facades\Auth;
use App\shared\services\roles\PermissionService;

class AuthorizationService
{
    public static function check(string $menuKey, string $action): void
    {
        $user = Auth::user();

        if (!PermissionService::userHasPermission($user, $menuKey, $action)) {
            abort(403, 'No tiene permiso para acceder a esta página.');
        }
    }
}
