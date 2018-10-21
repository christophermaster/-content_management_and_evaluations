<?php

namespace gestion\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EvaluationFormRequest extends FormRequest
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
            'id_escuela' =>'required',
            'id_materia' =>'required',
            'id_facultad' =>'required',
            'id_catedra' =>'required',
            'id_tema'=>'required',
        ];
    }
}
