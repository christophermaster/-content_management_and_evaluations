<?php

namespace gestion\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserResquest extends FormRequest
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
             'nombre' =>'required|max:25',
             'apellido' =>'required|max:25',
             'cedula' =>'required|max:15',
             'email' =>'string|email|max:255',
             'descripcion',
             'id_user'
        ];
    }
}
