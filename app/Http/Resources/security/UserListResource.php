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

        // Usuarios relacionados a la persona asociada
        $personaUserCrea = $this->persona->usuario_crea
            ? User::find($this->persona->usuario_crea)
            : null;

        $personaUserMod = $this->persona->usuario_modifica
            ? User::find($this->persona->usuario_modifica)
            : null;

        $personaUserCreaPersona = $personaUserCrea
            ? Persona::find($personaUserCrea->persona_id)
            : null;

        $personaUserModPersona = $personaUserMod
            ? Persona::find($personaUserMod->persona_id)
            : null;

        return [
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
                'usuario_crea' => $personaUserCreaPersona
                    ? $personaUserCreaPersona->nombre . ' ' . $personaUserCreaPersona->apellido
                    : null,
                'usuario_modifica' => $personaUserModPersona
                    ? $personaUserModPersona->nombre . ' ' . $personaUserModPersona->apellido
                    : null,
                'created_at' => $this->persona->created_at ?? null,
                'updated_at' => $this->persona->updated_at ?? null,
            ]
        ];
    }

    // public function toArray(Request $request): array
    // {
    //     // return parent::toArray($request);


    //     // En usuario
    //     $userCrea = User::find($this->usuario_crea);
    //     $userMod = User::find($this->usuario_modifica);

    //     $personaCrea = $userCrea ? Persona::find($userCrea->persona_id) : null;

    //     $personaModifica = $userMod ? Persona::find($userMod->persona_id) : null;

    //     // En persona
    //     $userCreaPersona = User::find($this->usuario_crea);
    //     $userModPersona = User::find($this->usuario_modifica);

    //     $personaCrea = $userCrea ? Persona::find($userCrea->persona_id) : null;

    //     $personaModifica = $userMod ? Persona::find($userMod->persona_id) : null;



    //     return [
    //         'username' => $this->username,
    //         'password_attempts' => $this->password_attempts,
    //         'estado' => $this->estado,
    //         'usuario_crea' => optional($personaCrea)->nombre && optional($personaCrea)->apellido
    //             ? "{$personaCrea->nombre} {$personaCrea->apellido}"
    //             : null,

    //         'usuario_modifica' => optional($personaModifica)->nombre && optional($personaModifica)->apellido
    //             ? "{$personaModifica->nombre} {$personaModifica->apellido}"
    //             : null,
    //         'created_at' => $this->created_at,
    //         'updated_at' => $this->updated_at,
    //         'rol' => $this->role->nombre,
    //         'persona' => [
    //             'nombre' => $this->persona->nombre,
    //             'apellido' => $this->persona->apellido,
    //             'direccion_domicilio' => $this->persona->direccion_domicilio,
    //             'dni' => $this->persona->dni,
    //             'digito_verificador' => $this->persona->digito_verificador,
    //             'telefono' => $this->persona->telefono,
    //             'usuario_crea' => $this->persona->usuario_crea,
    //             'usuario_modifica' => $this->persona->usuario_modifica,
    //             'created_at' => $this->persona->created_at,
    //             'updated_at' => $this->persona->updated_at,
    //         ]
    //     ];
    // }
}
