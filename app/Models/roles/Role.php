<?php

namespace App\Models\roles;

use App\Models\security\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    //
    protected $fillable = [
        'nombre',
        'descripcion',
        'usuario_crea'
    ];
    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function roleMenu(): HasMany
    {
        return $this->hasMany(RoleMenu::class);
    }
}
