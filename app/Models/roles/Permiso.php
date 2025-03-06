<?php

namespace App\Models\roles;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Permiso extends Model
{
    //
    public function roleMenu(): HasMany
    {
        return $this->hasMany(RoleMenu::class);
    }
}
