<?php

namespace App\Http\Requests\auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password as PasswordRules;


class RegistroRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'apellido' => ['required', 'string'],
            'dni' => ['required', 'string', 'min:8', 'max:8'],
            'digito_verificador' => ['required', 'string', 'min:1', 'max:1'],
            'telefono' => ['required', 'string', 'min:9', 'max:9'],
            'email' => ['required', 'email'],
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
            'name' => 'El campo es obligatorio',
            'apellido' => 'El campo es obligatorio',
            'dni' => 'El campo es obligatorio',
            'dni.min' => 'El DNI debe contener 8 dígitos',
            'dni.max' => 'El DNI debe contener 8 dígitos',
            'digito_verificador' => 'El campo es obligatorio',
            'digito_verificador.min' => 'El digito verificador debe contener un dígito.',
            'digito_verificador.max' => 'El digito verificador debe contener un dígito.',
            'telefono' => 'El teléfono es obligatorio.',
            'telefono.min' => 'El teléfono debe contener 9 caracteres.',
            'telefono.max' => 'El teléfono debe contener 9 caracteres.',
            'email' => 'El campo es obligatorio',
            'email.email' => 'Ingrese un email válido.',
            'password' => 'El campo es obligatorio',
            'password.confirmed' => 'Debe confirmar su contraseña.',
            // 'password.min' => 'La contraseña debe contener como mínimo 6 caracteres.',
            'password.*' => 'La contraseña de contener menos una letra y un número.',
        ];
    }
}
