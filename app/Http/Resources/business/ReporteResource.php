<?php

namespace App\Http\Resources\business;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReporteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
        // return [
        //     'imagen' => $this->imagen,
        //     'descripcion' => $this->descripcion,
        //     'direccion' => $this->direccion,
        //     'user_id' => $this->user_id,
        //     'categoria_id' => $this->categoria_id,
        //     'estado' => $this->estado,
        // ];
    }
}
