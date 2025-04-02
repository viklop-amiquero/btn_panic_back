<?php

namespace App\Http\Resources\business;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class ReporteResource extends JsonResource
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
            'imagen' => $this->imagen,
            'descripcion' => $this->descripcion,
            'categoria' => $this->categoria->nombre,
            'direccion' => $this->direccion,
            'usuario_nombre' => $this->user->persona->nombre ?? '',
            'usuario_apellido' => $this->user->persona->apellido ?? '',
            // 'user_id' => $this->user_id,
            'cliente' => $this->cliente->persona->nombre . ' ' . $this->cliente->persona->apellido,
            'latitud' => $this->latitud,
            'longitud' => $this->longitud,
            'estado' => $this->estado,
            'created_at' => Carbon::parse($this->created_at)->format('h:i A'),
            'created_date' => Carbon::parse($this->created_at)->format('d/m/Y'),
            // 'updated_at' => Carbon::parse($this->updated_at)->format('h:i A'),
            // 'updated_date' => Carbon::parse($this->updated_at)->format('d/m/Y'),
            // 'created_at' => $this->created_at,
            // 'updated_at' => $this->updated_at
        ];
    }
}
