<?php

namespace App\Models\security;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Clave extends Model
{
    //
    public function user(): HasOne
    {

        return $this->hasOne(User::class);
    }

    public function cliente(): HasOne
    {
        return $this->hasOne(Cliente::class);
    }
}
