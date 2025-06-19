<?php

namespace App\Http\Resources\auth;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoleMenuAuthResource extends JsonResource
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
            'role_id' => $this->role->id,
            'menu_clave' => $this->menu->clave,
            'route' => $this->menu->ruta,
            'icono' => $this->menu->icono,
            'menu_id' => $this->menu_id,
            'permiso_id' => $this->permiso_id,
        ];
    }
}
