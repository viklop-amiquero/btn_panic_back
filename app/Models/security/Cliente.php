<?php

namespace App\Models\security;

use App\Models\business\Reporte;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cliente extends Model
{
    //
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
