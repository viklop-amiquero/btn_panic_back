<?php

namespace App\shared\services\security;

use App\Models\security\User;
use App\Models\security\Clave;
use App\Models\security\Persona;
use App\shared\Traits\AuthorizesUser;
use App\Http\Resources\security\UserListCollection;
use App\Http\Resources\security\UserShowResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserService
{

    use AuthorizesUser;

    public function list()
    {
        $this->authorizeUser();

        return new UserListCollection(User::paginate(20));
    }

    public function create(array $data)
    {
        $this->authorizeUser();

        $persona = Persona::create([
            'nombre' => strtoupper($data['name']),
            'apellido' => strtoupper($data['apellido']),
            'direccion_domicilio' => strtoupper($data['direccion_domicilio']),
            'dni' => $data['dni'],
            'digito_verificador'  => $data['digito_verificador'],
            'telefono'  => $data['telefono'],
            'usuario_crea' => Auth::user()->id,
            'created_at' => now()
        ]);

        $clave = Clave::create([
            'clave_hash' => Hash::make($data['dni']),
            'clave_reset' => Hash::make($data['dni']),
            'usuario_crea' => Auth::user()->id,
            'created_at' => now()
        ]);

        User::create([
            'persona_id' => $persona->id,
            'clave_id' => $clave->id,
            'role_id' => $data['role_id'],
            'username' => $data['dni'],
            'usuario_crea' => Auth::user()->id,
            'created_at' => now()
        ]);

        return response()->json([
            "message" => 'Usuario creado exitosamente.',
        ]);
    }

    public function show($id)
    {
        $this->authorizeUser();

        $user = User::find($id);

        // return $user;
        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado.'], 404);
        }

        return new UserShowResource($user);
    }

    public function update(array $data, int $id)
    {
        $this->authorizeUser();

        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'usuario no encontrado.'], 404);
        }

        $persona = Persona::find($user->persona_id);

        if (!$persona) {
            return response()->json(['message' => 'usuario no encontrado.'], 404);
        }

        $clave = Clave::find($user->clave_id);

        if (!$clave) {
            return response()->json(['message' => 'Credenciales no encontrados.'], 404);
        }

        // return $clave;

        $persona->update([
            'nombre' => strtoupper($data['name']),
            'apellido' => strtoupper($data['apellido']),
            'direccion_domicilio' => strtoupper($data['direccion_domicilio']),
            'dni' => $data['dni'],
            'digito_verificador' => $data['digito_verificador'],
            'telefono' => $data['telefono'],
            'role_id' => $data['role_id'],
            'usuario_modifica' => Auth::user()->id,
            'updated_at' => now()

        ]);

        $user->update([
            'username' => $data['dni'],
            'role_id' => $data['role_id'],
            'usuario_modifica' => Auth::user()->id,
            'updated_at' => now()
        ]);

        $clave->update([
            'clave_reset' => Hash::make($data['dni']),
            'usuario_modifica' => Auth::user()->id,
            'updated_at' => now()
        ]);

        return response()->json([
            "message" => 'Datos actualizados exitosamente.',
        ]);
    }

    public function delete($id)
    {
        $this->authorizeUser();

        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'usuario no encontrada.'], 404);
        }

        $user->estado = 0;
        $user->usuario_modifica = Auth::user()->id;
        $user->save();

        return response()->json([
            "message" => 'Usuario eliminado exitosamente.',
        ]);
    }
}
