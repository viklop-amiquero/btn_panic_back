<?php

namespace App\Http\Resources\roles;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MenuResource extends JsonResource
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
            'icono' => $this->icono,
            'descripcion' => $this->descripcion,
            'url' => $this->url,
            'ruta' => $this->ruta,
            'nivel_parentesco' => $this->nivel_parentesco,
            'parentesco' => $this->parentesco,
            'nivel' => $this->nivel,
            'orden' => $this->orden,
            'tipo_menu' => $this->tipo_menu,
            'estado' => $this->estado
        ];
    }
}
