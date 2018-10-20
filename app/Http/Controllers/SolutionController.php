<?php

namespace gestion\Http\Controllers;

use Illuminate\Http\Request;
use gestion\Http\Requests\SolutionRequest;
use gestion\models\Exercise;
use gestion\models\Solution;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Middleware\Authenticate;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use DB;
use gestion\User;

class SolutionController extends Controller
{
    public function create($id)
    {
        /*$categorias = DB::table('categoria')->where('condicion','=','1')->get();*/
        return view("gestion.solucion.create",["id_ejercicio"=>$id]);
    }
    public function store (SolutionRequest $request)
    {
        $ejercicio = Exercise :: findOrfail($id);
        $solucion = new Solution; 
        $usuario = Auth::user();
        $hoy = date("Y-m-d H:i:s");  
        if($ejercicio->id){

            if(Auth::check()){
                $solucion->usuario_creador=$usuario->name;
                $solucion->usuario_modificador= $usuario->name;
                $solucion->id_usuario= $usuario->id;
            }
            $solucion->id_ejercicio = $id;
            $solucion->created_at = $hoy;
            $solucion->updated_at = $hoy;
            $solucion->contenido = $request->get('contenido');;
            $solucion->save();   
            return flash('Se guardo de forma Correcta')->success();
        }
        return flash('Se guardo de forma Correcta')->error();

    }
}
