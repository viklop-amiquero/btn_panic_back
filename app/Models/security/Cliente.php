<?php

namespace App\Models\security;

use App\Models\business\Reporte;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Contracts\Auth\Authenticatable;  // Importa la interfaz
use Illuminate\Auth\Authenticatable as AuthenticatableTrait; // Importa el trait

class Cliente  extends Model implements Authenticatable
{
    //
    use HasApiTokens, AuthenticatableTrait;

    protected $fillable = [
        'persona_id',
        'clave_id',
        'username'
    ];

    public function clave(): BelongsTo
    {
        return $this->belongsTo(Clave::class);
    }

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class);
    }

    public function reporte(): HasMany
    {
        return $this->hasMany(Reporte::class);
    }
}
