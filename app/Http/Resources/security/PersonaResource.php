<?php

namespace App\Http\Resources\security;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'direccion_domicilio' => $this->direccion_domicilio,
            'dni' => $this->dni,
            'telefono' => $this->telefono,
            'estado' => $this->estado
        ];
    }
}
