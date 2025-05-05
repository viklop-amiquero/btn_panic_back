<?php

namespace App\Http\Requests\password;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password as PasswordRules;

class PasswordRecoverRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'username' => [
                'required',
                function ($attribute, $value, $fail) {
                    $existsInClientes = \App\Models\security\Cliente::where('username', $value)->exists();

                    if (!$existsInClientes) {
                        $fail('El usuario no está registrado.');
                    }
                }
            ],

            'dni' => [
                'required',
                'string',
                'regex:/^[0-9]{8}$/',
                function ($attribute, $value, $fail) {
                    $existsInClientes = \App\Models\security\Persona::where('dni', $value)->exists();

                    if (!$existsInClientes) {
                        $fail('El DNI no está registrado.');
                    }
                }
            ],

            'digito_verificador' => [
                'required',
                'string',
                'regex:/^[0-9]$/',
            ],

            'password' => [
                'required',
                'confirmed',
                PasswordRules::min(6)->letters()->numbers()
            ]

        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'El usuario es obligatorio.',
            'username.exists' => 'Esta cuenta no existe',
            'dni.required' => 'El DNI es obligatorio.',
            'dni.exists' => 'El DNI no existe',
            'dni.regex' => 'Ingrese un número de DNI válido',
            'digito_verificador.required' => 'El dígito verificador es obligatorio.',
            'digito_verificador.regex' => 'Dígito verificador no válido.',
            'password' => 'El password es obligatorio.',
            'password.confirmed' => 'Debe confirmar su contraseña.',
            'password.*' => 'La contraseña de contener por lo menos una letra y un número.',
        ];
    }
}
