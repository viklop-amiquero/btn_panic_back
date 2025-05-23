<?php

namespace App\Http\Resources\security;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserListResource extends JsonResource
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
            'username' => $this->username,
            'password_attempts' => $this->password_attempts,
            'estado' => $this->estado,
            'usuario_crea' => $this->usuario_crea,
            'usuario_modifica' => $this->usuario_modifica,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'rol' => $this->role->nombre,
            'persona' => [
                'nombre' => $this->persona->nombre,
                'apellido' => $this->persona->apellido,
                'direccion_domicilio' => $this->persona->direccion_domicilio,
                'dni' => $this->persona->dni,
                'digito_verificador' => $this->persona->digito_verificador,
                'telefono' => $this->persona->telefono,
                'usuario_crea' => $this->persona->usuario_crea,
                'usuario_modifica' => $this->persona->usuario_modifica,
                'created_at' => $this->persona->created_at,
                'updated_at' => $this->persona->updated_at,
            ]
        ];
    }
}
