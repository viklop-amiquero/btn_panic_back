<?php

namespace App\Models\business;

use App\Models\security\Cliente;
use App\Models\security\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reporte extends Model
{
    //
    protected $fillable = [
        'imagen',
        'descripcion',
        'direccion',
        'categoria_id',
        'cliente_id',
        'created_at',
    ];

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }
}
