<?php

namespace gestion\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserResquest extends FormRequest
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
             'name' =>'required|max:25|unique:users',
             'email' =>'required|string|email|max:255|unique:users',
             'id_cargo' =>'required',
             'id_escuela' =>'required',
             'id_materia' =>'required',
             'id_facultad' =>'required',
             'id_catedra' =>'required',
             'id_user',
             'password'=>'required|string|min:6'
        ];
    }
}
