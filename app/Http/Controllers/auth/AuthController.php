<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Models\security\User;
use App\Models\security\Clave;
use App\Models\security\Cliente;
use App\Models\security\Persona;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\auth\LoginRequest;
use App\Http\Requests\auth\RegistroRequest;
use App\Http\Resources\business\ReporteCollection;
use App\Http\Resources\security\ClienteResource;
use App\Http\Resources\security\PersonaResource;
use App\Http\Resources\security\UserResource;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function register(RegistroRequest $request)
    {
        $data = $request->validated();

        $persona = Persona::create([
            'nombre' => strtoupper($data['name']),
            'apellido' => strtoupper($data['apellido']),
            'direccion_domicilio' => strtoupper($data['direccion_domicilio']),
            'dni' => $data['dni'],
            'digito_verificador'  => $data['digito_verificador'],
            'telefono'  => $data['telefono'],
            'created_at' => now()
        ]);

        $clave = Clave::create([
            // 'clave_hash' => bcrypt($data['password']),
            // 'clave_reset' => bcrypt($data['dni']),
            'clave_hash' => Hash::make(($data['password'])),
            'clave_reset' => Hash::make($data['dni']),
            'created_at' => now()
        ]);

        $cliente = Cliente::create([
            'persona_id' => $persona->id,
            'clave_id' => $clave->id,
            'username' => $data['email'],
            'created_at' => now()
        ]);

        return response()->json([
            "message" => 'Registro exitoso.',
            'token' => $cliente->createToken('token')->plainTextToken,
            // 'cliente' => $cliente
        ]);

        // return $data;
    }

    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        // Buscar si es un cliente o un usuario
        $cliente = Cliente::where('username', $data['username'])->where('estado', '1')->first();
        $user = User::where('username', $data['username'])->where('estado', '1')->first();

        // Determinar qué tipo de usuario es
        $authEntity = $cliente ?? $user;
        $role = $cliente ? 'cliente' : 'user';

        // Si no existe ni como cliente ni como usuario
        if (!$authEntity) {
            return response([
                'errors' => ['El usuario y/o contraseña son incorrectos.']
            ], 422);
        }

        // Buscar la clave del usuario autenticado
        $clave = Clave::find($authEntity->clave_id);

        // Verificar la contraseña
        if (!$clave || !password_verify($data['password'], $clave->clave_hash)) {
            return response([
                'errors' => ['El usuario y/o contraseña son incorrectos.']
            ], 422);
        }

        // Generar token y retornar usuario autenticado

        if ($role === 'cliente') {
            $reportes = $cliente->reporte()->orderBy('created_at', 'DESC')->paginate(10);
            return response()->json([
                'token' => $authEntity->createToken("{$role}-token")->plainTextToken,
                'role' => $role,
                'user' => new ClienteResource($authEntity),
                'reports' => new ReporteCollection($reportes),
                // 'persona' => new PersonaResource($authEntity->persona)
                'persona' => $authEntity->persona
            ]);
        }

        return response()->json([
            'token' => $authEntity->createToken("{$role}-token")->plainTextToken,
            'role' => $role,
            'user' => new UserResource($authEntity),
            // 'persona' => new PersonaResource($authEntity->persona)
            // 'persona' => new UserResource($authEntity->persona)
            'persona' => new PersonaResource($authEntity->persona)

        ]);
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->currentAccessToken()->delete();

        return response()->json([
            'user' => null
        ]);
    }
}
