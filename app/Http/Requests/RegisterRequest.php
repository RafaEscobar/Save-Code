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
            'name' => 'required|max:60|string',
            'lastName' => 'required|max:120|string',
            'email' => 'required|email|unique:users|max:230',
            'password' => 'required'

        ];
    }

    public function messages()
    {
        return [
            '*.required' => 'El campo es requerido.',
            'name.max' => 'El nombre debe ser más corto.',
            'lastName.max' => 'El campo de apellidos debería ser más corto.',
            '*.string' => 'El campo solo debe contener texto.',
            '*.email' => 'El correo no tiene el formato correcto',
            'email.max' => 'El correo electrónico debe ser más corto.',
            'email.unique' => 'El correo electrónico proporcionado ya ha sido utilizado.'
        ];
    }
}
