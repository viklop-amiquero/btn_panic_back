<?php

namespace App\Http\Resources\security;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClienteResource extends JsonResource
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
            'persona_id' => $this->persona_id,
            'clave_id' => $this->clave_id,
            'username' => $this->username,
            'verificado' => $this->verificado,
            'estado' => $this->estado,
            'usuario_crea' => $this->usuario_crea,
            'usuario_modifica' => $this->usuario_modifica,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
