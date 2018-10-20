<?php

namespace gestion\Http\Controllers;

use Illuminate\Http\Request;
use gestion\models\Upload;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use File;
use DB;

class UploadController extends Controller
{
    public function upload(){

         $faculty=DB::table('faculties as f')
        ->select('f.id','f.nombre')
        ->get();
         $dificultad=DB::table('difficulties as d')
        ->select('d.id','d.nombre')
        ->get();
          $tipo_ejercicio=DB::table('typeexercises as te')
        ->select('te.id','te.nombre')
        ->get();
        return view('upload.upload',["faculty"=>$faculty,"dificultad"=>$dificultad,"tipo_ejercicio"=>$tipo_ejercicio]);

    }
    public function uploadd(Request $request){

        $upload = new Upload;
        $usuario = Auth::user();
        $hoy = date("Y-m-d H:i:s");
        if($request->hasFile('file'))
    	{
            $upload->id_usuario = $usuario->id;
            $upload->usuario_creador= $usuario->name;
            $upload->usuario_modificador= $usuario->name;
            $upload->created_at = $hoy;
            $upload->updated_at = $hoy;
            $upload->id_facultad =$request->id_facultad;
    		$imageFile = $request->file('file');
            $imageName = $imageFile->getClientOriginalName();
            $upload->tipo_nombre = $imageFile->getClientMimeType();
            $upload->ruta = 'uploads/'.$imageName;
            $upload->save();
            $imageFile->move(public_path('uploads'), $imageName);
        }
        
        return Redirect::to('gestion/contenido');
    }
}
