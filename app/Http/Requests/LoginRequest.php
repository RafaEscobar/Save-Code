<?php

namespace App\Http\Requests;

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
            'email' => 'required|email|max:230',
            'password' => 'required|min:8|max:60'
        ];
    }

    public function messages()
    {
        return [
            'email.max' => 'El correo electrónico debe ser más corto.',
            'password.min' => 'La contraseña debe tener mínimo 8 caracteres.',
            'password.max' => 'La contraseña debe tener máximo 60 caracteres.',
            '*.required' => 'El campo es requerido.',
        ];
    }
}
