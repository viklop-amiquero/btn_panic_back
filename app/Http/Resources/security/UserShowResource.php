<?php

namespace App\Http\Resources\security;

use Illuminate\Http\Request;
use App\Models\security\Persona;
use Illuminate\Http\Resources\Json\JsonResource;

class UserShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // datos user -> persona
        // $userPersona =
        // credenciales user -> clave



        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'username' => $this->username,
            'password_attempts' => $this->password_attempts,
            'estado' => $this->estado,
            'usuario_crea' => '',
            'usuario_modifica' => '',
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'role_id' => $this->role_id,
            'persona' => [
                'nombre' => $this->persona->nombre,
                'apellido' => $this->persona->apellido,
                'direccion' => $this->persona->direccion_domicilio,
                'dni' => $this->persona->dni,
                'digito_verificador' => $this->persona->digito_verificador,
                'telefono' => $this->persona->telefono,
                'role_id' => $this->role_id,
                'usuario_crea' => '',
                'usuario_modifica' => '',
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ],
            'clave' => [
                'clave_changed' => $this->clave->clave_changed,
                'usuario_crea' => '',
                'usuario_modifica' => '',
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ]
        ];
    }
}
