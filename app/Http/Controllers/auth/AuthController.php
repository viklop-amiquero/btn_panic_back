<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\auth\RegistroRequest;
use App\Models\security\Clave;
use App\Models\security\Cliente;
use App\Models\security\Persona;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function register(RegistroRequest $request)
    {
        $data = $request->validated();

        $persona = Persona::create([
            'nombre' => $data['name'],
            'apellido' => $data['apellido'],
            'direccion_domicilio' => $data['direccion_domicilio'],
            'dni' => $data['dni'],
            'digito_verificador'  => $data['digito_verificador'],
            'telefono'  => $data['telefono'],
        ]);

        $clave = Clave::create([
            'clave_hash' => bcrypt($data['password']),
            'clave_reset' => bcrypt($data['dni'])
        ]);

        $cliente = Cliente::create([
            'persona_id' => $persona->id,
            'clave_id' => $clave->id,
            'username' => $data['email']
        ]);

        return [
            'token' => $cliente->createToken('token')->plainTextToken,
            'cliente' => $cliente
        ];

        return $data;
    }
}
