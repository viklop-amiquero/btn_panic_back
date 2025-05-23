<?php

namespace App\shared\Traits;

use Illuminate\Support\Facades\Auth;

trait AuthorizesCliente
{

    public function authorizeCliente()
    {
        $user = Auth::user();

        // Es un usuario
        if ($user->isUser()) {
            // abort(403, 'Acción no permitida.');
            return response()->json([
                'message' => 'Acción no permitida.'
            ], 403);
        }
    }
}
