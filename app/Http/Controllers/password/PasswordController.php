<?php

namespace App\Http\Controllers\password;

use App\Http\Controllers\Controller;
use App\Http\Requests\password\PasswordRecoverRequest;
use App\Models\security\Clave;
use App\Models\security\Cliente;
use App\Models\security\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    //
    public function recoverPassword(PasswordRecoverRequest $request)
    {
        // return 'recuperar password';
        $data = $request->validated();

        $cliente = Cliente::where('username', $request->username)->first();

        if (!$cliente) {
            return response()->json([
                'errors' => ['El usuario no fue encontrado.']
            ], 404);
        }

        $persona =  Persona::find($cliente->persona_id);

        if (!$persona || $persona->telefono !== $request->telefono) {
            return response()->json([
                'errors' => ['Usuario o teléfono no coinciden con los registrados.']
            ], 422);
        }
        // if ($persona->telefono !== $request->telefono) {
        //     // return 'las credenciales no coinciden.';
        //     return response([
        //         'errors' => ['El usuario y/o teléfono no coincide con la información que se registró.']
        //     ], 422);
        // }

        $clave = Clave::find($cliente->clave_id);

        $clave->clave_hash = Hash::make(($data['password']));
        $clave->clave_reset = Hash::make(($data['password']));

        $clave->save();

        return response()->json([
            "message" => 'Contraseña actualizada exitosamente.',
        ]);
    }
}
