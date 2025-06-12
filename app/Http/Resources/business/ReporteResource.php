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
            // Si esa expresión no es null, devuelve ese valor
            // Si es null, devuelve lo que está a su derecha
            'usuario_nombre' => $this->user->persona->nombre ?? null,
            'usuario_apellido' => $this->user->persona->apellido ?? null,
            // 'user_id' => $this->user_id,
            'cliente_nombre' => $this->cliente->persona->nombre,
            'cliente_apellido' => $this->cliente->persona->apellido,
            'telefono' => $this->cliente->persona->telefono,
            'latitud' => $this->latitud,
            'longitud' => $this->longitud,
            'estado' => $this->estado,
            'usuario_crea' => $this->usuario_crea,
            'usuario_modifica' => $this->usuario_modifica,
            // 'created_at' => Carbon::parse($this->created_at)->locale('es')->diffForHumans(),
            'created_at' => Carbon::parse($this->created_at)->format('h:i A'),
            'created_date' => Carbon::parse($this->created_at)->format('d/m/Y'),
            'updated_at' => $this->updated_at ? Carbon::parse($this->updated_at)->format('h:i A') : null,
            'updated_date' => $this->updated_at ? Carbon::parse($this->updated_at)->format('d/m/Y') : null,
            // 'updated_at' => Carbon::parse($this->updated_at)->format('h:i A'),
            // 'updated_date' => Carbon::parse($this->updated_at)->format('d/m/Y'),
        ];
    }
}
