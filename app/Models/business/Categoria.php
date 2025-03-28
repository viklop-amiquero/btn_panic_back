<?php

namespace App\Models\business;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    //
    protected $fillable = [
        'nombre',
        'descripcion',
        'usuario_crea',
        'usuario_modifica'
    ];

    public function reporte(): HasMany
    {
        return $this->hasMany(Reporte::class);
    }
}
