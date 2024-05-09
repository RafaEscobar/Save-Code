<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|max:60|min:6|string',
            'lastName' => 'required|max:120|string|min:6',
            'email' => 'required|email|unique:users|max:230',
            'password' => 'required|min:8|max:60'

        ];
    }

    public function messages()
    {
        return [
            "name.min" => 'El nombre debe contener mínimo 6 caracteres.',
            'name.max' => 'El nombre debe ser más corto.',
            'lastName.max' => 'El campo de apellidos debería ser más corto.',
            "lastName.min" => 'Los apellidos deben contener mínimo 6 caracteres.',
            'email.max' => 'El correo electrónico debe ser más corto.',
            'email.unique' => 'El correo electrónico proporcionado ya ha sido utilizado.',
            'password.min' => 'La contraseña debe tener mínimo 8 caracteres.',
            'password.max' => 'La contraseña debe tener máximo 60 caracteres.',
            '*.required' => 'El campo es requerido.',
            '*.string' => 'El campo solo debe contener texto.',
            '*.email' => 'El correo no tiene el formato correcto',
        ];
    }
}
