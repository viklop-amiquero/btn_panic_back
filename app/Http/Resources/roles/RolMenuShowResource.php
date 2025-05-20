<?php

namespace App\Http\Resources\roles;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RolMenuShowResource extends JsonResource
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
            'role_id' => $this->role_id,
            'role_name' => $this->role->nombre,
            'role_description' => $this->role->descripcion,
            'menu_id' => $this->menu_id,
            'permiso_id' => $this->permiso_id,
        ];
    }
}
