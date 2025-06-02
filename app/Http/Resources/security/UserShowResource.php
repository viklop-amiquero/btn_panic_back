<?php

namespace App\Http\Resources\security;

use Illuminate\Http\Request;
use App\Models\security\Persona;
use Illuminate\Http\Resources\Json\JsonResource;

class UserShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'id' => $this->id,
            'nombre' => $this->persona->nombre,
            'apellido' => $this->persona->apellido,
            'direccion_domicilio' => $this->persona->direccion_domicilio,
            'dni' => $this->persona->dni,
            'digito_verificador' => $this->persona->digito_verificador,
            'telefono' => $this->persona->telefono,
            'role_id' => $this->role_id,
        ];
    }
}
