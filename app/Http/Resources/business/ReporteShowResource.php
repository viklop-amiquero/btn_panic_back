<?php

namespace App\Http\Resources\business;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReporteShowResource extends JsonResource
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
            'categoria' => $this->categoria->nombre,
            'imagen' => $this->imagen,
            'descripcion' => $this->descripcion,
            'direccion' => $this->direccion,
            'cliente' => $this->cliente->persona->nombre . ' ' . $this->cliente->persona->apellido,
            'telefono' => $this->cliente->persona->telefono
        ];
    }
}
