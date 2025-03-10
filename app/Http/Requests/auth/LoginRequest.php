<?php

namespace App\Http\Requests\auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'username' => [
                'required',
                function ($attribute, $value, $fail) {
                    $existsInClientes = \App\Models\security\Cliente::where('username', $value)->exists();
                    $existsInUsers = \App\Models\security\User::where('username', $value)->exists();

                    if (!$existsInClientes && !$existsInUsers) {
                        $fail('El usuario no está registrado.');
                    }
                }
            ],
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'El usuario es obligatorio.',
            'username.exists' => 'Esta cuenta no existe',
            'password' => 'El password es obligatorio.'
        ];
    }
}
