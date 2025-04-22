<?php

namespace App\Http\Requests\business;

use Illuminate\Foundation\Http\FormRequest;

class ReporteRequest extends FormRequest
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
            // 'imagen' => 'nullable',
            'imagen' => 'nullable|image|max:2048',
            'descripcion' => 'required',
            'direccion' => ['required'],
            'categoria_id' => ['required', 'numeric'],
            'latitud' => ['required', 'numeric'],
            'longitud' => ['required', 'numeric']
            // 'cliente_id' => ['required', 'numeric']
        ];
    }

    public function messages()
    {
        return [
            'descripcion' => 'La descripción es obligatorio.',
            'direccion' => 'La dirección es obligatorio.',
            'categoria_id' => 'La categoría es obligatorio.',
            'categoria_id.numeric' => 'La categoría es inválido.',
            'latitud' => 'La latitud es obligatorio.',
            'longitud' => 'La longitud es obligatorio.'
            // 'cliente_id' => 'El cliente es obligatorio.',
            // 'cliente_id.numeric' => 'El cliente es inválido.',
        ];
    }
}
