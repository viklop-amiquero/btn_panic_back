<?php

namespace App\Models\security;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Persona extends Model
{
    //
    protected $fillable = [
        'nombre',
        'apellido',
        'direccion_domicilio',
        'dni',
        'digito_verificador',
        'telefono',
        'email',
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function cliente(): HasOne
    {
        return $this->hasOne(Cliente::class);
    }
}
