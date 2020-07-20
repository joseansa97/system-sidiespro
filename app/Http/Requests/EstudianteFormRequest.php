<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstudianteFormRequest extends FormRequest
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
            'titulo' => 'required|min:5|max:250',
            'asesor' => 'required|min:3|max:100',
            'autor' => 'required|min:3|max:100',
            'autor2' => 'max:100',
            'carrera_id' => 'required',
            'residencia_id' => 'required',
            'archivo' => 'required|mimes:pdf',
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'Titulo requerido',
            'titulo.min' => 'Minimo cinco caracteres',
            'titulo.max' => 'Limite excedido de caracteres',
            'asesor.required'  => 'Asesor es requerido',
            'asesor.min' => 'Minimo tres caracteres',
            'asesor.max' => 'Limite excedido de caracteres',
            'autor.required'  => 'Integrante es requerido',
            'autor.min' => 'Minimo tres caracteres',
            'autor.max'  => 'Limite excedido de caracteres',
            'autor2.max'  => 'Limite excedido de caracteres',
            'carrera_id.required'  => 'La carrera es requerido',
            'residencia_id.required' => 'Residencia es requerido',
            'archivo.required' => 'El archivo es requerido',
            'archivo.mimes' => 'El archivo debe ser en formato pdf',
            'archivo.min'  => 'Minimo cinco caracteres',
            'archivo.max'  => 'Limite excedido de caracteres',
        ];
    }
}
