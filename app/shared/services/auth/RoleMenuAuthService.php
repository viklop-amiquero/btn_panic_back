<?php

namespace App\shared\services\auth;

use App\Http\Resources\auth\RoleMenuAuthCollection;
use App\Models\security\User;
use App\Models\roles\RoleMenu;
use Illuminate\Support\Facades\Auth;
use App\shared\Traits\AuthorizesUser;

class RoleMenuAuthService
{

    use AuthorizesUser;

    public function getRoleMenuAuth()
    {
        $this->authorizeUser();

        $user = User::find(Auth::user()->id);

        if (!$user) {
            return response()->json([
                'message' => 'Usuario no encontrado.'
            ]);
        }

        $roleMenu = RoleMenu::where('role_id', $user->role_id)->get();

        if ($roleMenu->isEmpty()) {
            return response()->json(['message' => 'Rol no encontrado.'], 404);
        }

        return response()->json([
            // 'user_id' => $user->id,
            'role_menu' => new RoleMenuAuthCollection($roleMenu)
        ]);
    }
}
