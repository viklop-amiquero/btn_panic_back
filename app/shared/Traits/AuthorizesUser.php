<?php

namespace App\shared\Traits;

use Illuminate\Support\Facades\Auth;

trait AuthorizesUser
{
    public function authorizeUser()
    {
        $user = Auth::user();
        if (!$user || !$user->isUser()) {
            abort(403, 'Acción no permitida.');
        }
    }
}
