<?php

namespace App\Models\roles;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RoleMenu extends Model
{
    //
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }

    public function permiso(): BelongsTo
    {
        return $this->belongsTo(Permiso::class);
    }
}
