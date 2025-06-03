<?php

namespace App\shared\Traits;

use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\AuthorizationException;

trait AuthorizesUser
{
    public function authorizeUser()
    {
        $user = Auth::user();
        if (!$user || !$user->isUser()) {
            // abort(403, 'Acción no permitida.');
            throw new AuthorizationException('Acción no permitida.');

            // return response()->json([
            //     'message' => 'Acción no permitida.'
            // ], 403);
        }
    }
}
