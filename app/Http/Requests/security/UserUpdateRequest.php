<?php

namespace App\Http\Requests\security;

use App\Models\roles\Role;
use App\Models\security\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
        $idParam = $this->route('user');
        $user = User::find($idParam);

        $personaId = $user->persona_id;

        return [
            //
            'name' => ['required', 'string', 'regex:/^[\pL\s]+$/u'],
            'apellido' => ['required', 'string', 'regex:/^[\pL\s]+$/u'],
            'direccion_domicilio' => ['required', 'string'],
            'dni' => [
                'required',
                'string',
                'regex:/^\d{8}$/',
                Rule::unique('personas', 'dni')->ignore($personaId),

            ],
            'digito_verificador' => ['required', 'string', 'regex:/^\d{1}$/'],
            'telefono' => ['required', 'string', 'regex:/^\d{9}$/'],
            'role_id' => [
                'required',
                'numeric',
                function ($attribute, $value, $fail) {
                    $existsRol = Role::where('id', $value)->exists();

                    if (!$existsRol) {
                        $fail('No existe rol');
                    }
                }
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio',
            'name.regex' => 'El nombre no es válido.',
            'apellido.required' => 'El apellido es obligatorio',
            'apellido.regex' => 'El apellido no es valido',
            'direccion_domicilio.required' => 'La dirección es obligatorio',
            'dni.required' => 'El dni es obligatorio',
            'dni.regex' => 'El DNI no es válido.',
            'dni.unique' => 'El DNI ha sido registrado.',
            'digito_verificador.required' => 'El dígito verificador es obligatorio',
            'digito_verificador.regex' => 'El dígito verificador no es válido.',
            'telefono.required' => 'El número de celular es obligatorio.',
            'telefono.regex' => 'Ingrese un número de celular válido',
            'password.required' => 'La contraseña es obligatoria.',
            'password.confirmed' => 'Debe confirmar su contraseña.',
            'password.*' => 'La contraseña de contener por lo menos una letra y un número.',
            'role_id.required' => 'El rol es obligatorio.',
            'role_id.numeric' => 'El rol es inválido.'
        ];
    }
}
