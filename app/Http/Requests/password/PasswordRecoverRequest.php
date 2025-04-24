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

            'telefono' => [
                'required',
                'string',
                'regex:/^\d{9}$/',
                function ($attribute, $value, $fail) {
                    $existsInClientes = \App\Models\security\Persona::where('telefono', $value)->exists();

                    if (!$existsInClientes) {
                        $fail('El teléfono no está registrado.');
                    }
                }
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
            'required.required' => 'El usuario es obligatorio.',
            'required.exists' => 'Esta cuenta no existe',
            'telefono.required' => 'El teléfono es obligatorio.',
            'telefono.regex' => 'Ingrese un número de celular válido',
            'telefono.exists' => 'El teléfono no existe',
            'password' => 'El password es obligatorio.',
            'password.confirmed' => 'Debe confirmar su contraseña.',
            'password.*' => 'La contraseña de contener por lo menos una letra y un número.',
        ];
    }
}
