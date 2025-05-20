<?php

namespace App\Http\Resources\roles;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoleMenuResource extends JsonResource
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
            'id_rol' => $this->role_id,
            'rol' => $this->role->nombre,
            'menu' => $this->menu->nombre,
            'permiso' => $this->permiso->descripcion
        ];
    }
}
