<?php

namespace App\shared\Traits;

use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\AuthorizationException;

trait AuthorizesCliente
{

    public function authorizeCliente()
    {
        $user = Auth::user();

        // Es un usuario
        if ($user->isUser()) {
            throw new AuthorizationException('Acción no permitida.');
            // abort(403, 'Acción no permitida.');
            // return response()->json([
            //     'message' => 'Acción no permitida.'
            // ], 403);
        }
    }
}
