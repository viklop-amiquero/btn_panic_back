<?php

namespace App\Http\Requests\rol;

use Illuminate\Foundation\Http\FormRequest;

class RolMenuRequest extends FormRequest
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
            'nombre' => ['required', 'string', 'regex:/^[\pL\s]+$/u'],
            'descripcion' => ['required', 'string'],
            'permisos' => 'required|array',
            'permisos.*.menu_id' => 'required|integer|exists:menus,id',
            'permisos.*.permiso_id' => 'required|integer|exists:permisos,id',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.regex' => 'El nombre es invalido.',
            'permisos' => 'La datos enviados son incorrectos.',
            'permisos.*' => 'El menú y permiso son obligatorios.',
        ];
    }
}
