<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoordinatorFormRequest extends FormRequest
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
            'carrera' => 'required|unique:carrera_user,carrera_id',
            'coordinador' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'carrera.required' => 'Es obligatorio seleccionar la carrera',
            'carrera.unique' => 'La carrera seleccionada ya se encuentra registrado',
            'coordinador.required' => 'Es obligatorio seleccionar el coordinador',
        ];
    }
    
}
