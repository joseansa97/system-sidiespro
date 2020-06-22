<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:50',
            'first' => 'required|min:3|max:50',
            'second' => 'min:3|max:50',
            'phone' => 'required|min:8|max:20',
            'email' => 'required|unique:users|min:5|max:100',
            'role' => 'required',
            'password' => 'required|min:5|max:100',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nombre requerido',
            'name.min' => 'Minimo tres caracteres',
            'name.max' => 'Limite excedido de caracteres',
            'first.required'  => 'Apellido Paterno requerido',
            'first.min' => 'Minimo tres caracteres',
            'first.max' => 'Limite excedido de caracteres',
            'second.min'  => 'Apellido Materno minimo tres caracteres',
            'second.max' => 'Limite excedido de caracteres',
            'phone.required'  => 'Número de telefono requerido',
            'phone.min' => 'Minimo ocho caracteres',
            'phone.max' => 'Limite excedido de caracteres',
            'email.required'  => 'Correo electronico requerido',
            'email.unique'  => 'Correo electronico ya existe',
            'email.min' => 'Minimo cinco caracteres',
            'email.max' => 'Limite excedido de caracteres',
            'role.required'  => 'Rol de usuario requerido',
            'password.required'  => 'La contraseña es requerido',
        ];
    }
}
