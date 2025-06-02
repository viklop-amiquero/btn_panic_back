<?php

namespace App\Http\Resources\security;

use App\Models\security\Persona;
use App\Models\security\User;
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
        // Usuarios relacionados al user principal
        $userCrea = User::find($this->usuario_crea);
        $userMod = User::find($this->usuario_modifica);

        $personaCrea = $userCrea ? Persona::find($userCrea->persona_id) : null;
        $personaModifica = $userMod ? Persona::find($userMod->persona_id) : null;


        return [
            'id' => $this->id,
            'username' => $this->username,
            'password_attempts' => $this->password_attempts,
            'estado' => $this->estado,
            'usuario_crea' => $personaCrea
                ? $personaCrea->nombre . ' ' . $personaCrea->apellido
                : null,
            'usuario_modifica' => $personaModifica
                ? $personaModifica->nombre . ' ' . $personaModifica->apellido
                : null,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'rol' => $this->role->nombre ?? null,
            'persona' => [
                'nombre' => $this->persona->nombre ?? null,
                'apellido' => $this->persona->apellido ?? null,
                'direccion_domicilio' => $this->persona->direccion_domicilio ?? null,
                'dni' => $this->persona->dni ?? null,
                'digito_verificador' => $this->persona->digito_verificador ?? null,
                'telefono' => $this->persona->telefono ?? null,
            ]
        ];
    }
}
