<?php

namespace App\shared\services\security;

use App\Models\security\Clave;
use App\Models\security\Cliente;
use App\Models\security\Persona;
use App\Models\security\User;
use App\shared\Traits\AuthorizesCliente;
use App\shared\Traits\AuthorizesUser;
use Illuminate\Support\Facades\Hash;

class PasswordService
{

    use AuthorizesUser;
    use AuthorizesCliente;

    public function recover(array $data)
    {
        $this->authorizeCliente();

        $cliente = Cliente::where('username', $data['username'])->first();

        if (!$cliente) {
            return response()->json([
                'errors' => ['El usuario no fue encontrado.']
            ], 404);
        }

        // Verificar si la cuenta está suspendida
        if ($cliente->estado == 0) {
            return response()->json([
                'errors' => ['La cuenta está suspendida por demasiados intentos fallidos.']
            ], 403);
        }

        $persona = Persona::find($cliente->persona_id);

        $credencialesValidas = $persona
            && $cliente->username === $data['username']
            && $persona->dni === $data['dni']
            && $persona->digito_verificador === $data['digito_verificador'];

        if (!$credencialesValidas) {
            $cliente->password_attempts += 1;

            if ($cliente->password_attempts > 2) {
                $cliente->estado = 0; // suspender cuenta
            }

            $cliente->save();

            return response()->json([
                'errors' => ['Los datos ingresados no coinciden.']
            ], 422);
        }

        // Credenciales válidas: resetear contador
        $cliente->password_attempts = 0;
        $cliente->save();

        $clave = Clave::find($cliente->clave_id);

        $clave->clave_hash = Hash::make($data['password']);
        $clave->clave_reset = Hash::make($data['password']);
        $clave->save();

        $cliente->tokens()->delete();

        return response()->json([
            "message" => 'Contraseña actualizada exitosamente.'
        ]);
    }

    public function reset(User $user)
    {
        $this->authorizeUser();

        if (!$user->clave) {
            return response()->json([
                'message' => 'No se encontraron credenciales.'
            ], 404);
        }

        $user->clave->clave_hash = $user->clave->clave_reset;
        $user->clave->save();

        $user->tokens()->delete();

        return response()->json([
            "message" => 'Se ha reseteado la contraseña exitosamente.'
        ]);
    }
}
