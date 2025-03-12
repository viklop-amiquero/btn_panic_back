<?php

namespace App\Http\Controllers\business;

use Illuminate\Http\Request;
use App\Models\security\User;
use App\Models\business\Reporte;
use App\Models\security\Cliente;
use App\Models\business\Categoria;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\business\ReporteCollection;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = User::find(Auth::user()->id);
        $cliente = Cliente::find(Auth::user()->id);

        if ($user->confirm_user) {
            return 'es un usuario';
        }

        return 'es un cliente';
        // if(!$user && !$cliente->confirm_user){

        // }

        // if(){

        // }

        // return [
        //     "user" => $user->confirm_user,
        //     "cliente" => $cliente->confirm_user
        // ];

        if (!$user && !$cliente->confirm_user) {
            // Es un cliente
            return [
                "message" => 'es un cliente.',
                "condicional" => !$user,
                "!cliente->confirm_user" => !$cliente->confirm_user
            ];
        }



        // if ($user->confirm_user) {
        //     return [
        //         "message" => 'es un usuario.',
        //         "condicional" => $user->confirm_user
        //     ];
        // }


        // verificar que exista usuario
        // if (!$user) {
        // Es un cliente

        //     return [
        //         "message" => 'es un cliente first if',
        //         "condicional" => !$user
        //     ];
        // }

        // confirmar que es un usuario
        // if (!$user->role) {
        //Es un cliente

        //     return [
        //         "message" => 'Es un cliente second if',
        //         "codicional" => !$user->role
        //     ];
        // }

        // return [
        //     "message" => 'Es un usuario',
        //     "codicional" => $user->role
        // ];

        // $cliente = Cliente::find(Auth::user()->id);

        // if ($user->role->id) {
        //     return 'es un usuario';
        // }
        // return 'es un cliente';
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Reporte $reporte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $reporte = Reporte::find($id);

        if (!$reporte) {
            return response()->json([
                'message' => 'Reporte no encontrado.'
            ], 404);
        }

        $reporte->estado = '2';
        $reporte->usuario_modifica = Auth::user()->id;
        $reporte->save();

        return response()->json([
            'message' => 'Reporte actualizado correctamente.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reporte $reporte)
    {
        //
    }
}
