<?php

namespace gestion\Http\Controllers;

use Illuminate\Http\Request;
use gestion\models\Upload;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use gestion\Http\Requests\ExerciseRequest;
use gestion\models\Faculty;
use gestion\models\School;
use gestion\models\Cathedra;
use gestion\models\Matter;
use gestion\models\Topic;
use gestion\models\Exercise;
use gestion\models\Content;
use File;
use DB;

class UploadController extends Controller
{

    public function index(Request $request){
        $usuario = Auth::user();
        if($request){

            $query=trim($request->get('searchText'));
            if($usuario->id = 1 || $usuario->id = 1 ){
               
                $upload=DB::table('uploads as upl')
                ->select('upl.*')
                //->where('upl.nombre','LIKE','%'.$query.'%')
                //->orwhere('a.codigo','LIKE','%'.$query.'%')
                ->orderBy('upl.id','asc')
                ->paginate(40);
               

            }else{
                $upload=DB::table('uploads as upl')
                ->select('upl.*')
                ->join('users as us','upl.id_usuario','=',"us.id")
                ->join('roles as rol','us.id_cargo','=',"rol.id")
                ->where('rol.id','=',"3")
                ->orderBy('upl.id','asc')
                ->paginate(40);
            }  

              //cabtidad de ejercicio subido por usuario
            $cantEjercicio = DB::table('exercises as exx')
            ->select(DB::raw('count(*) as cantidad'))
            ->where('exx.id_usuario','=', $usuario->id)
            ->get()
            ->first();
            //cabtidad de soluciones subido por usuario
            $cantSoluciones = DB::table('solutions as sol')
            ->select(DB::raw('count(*) as cantidad'))
            ->where('sol.id_usuario','=', $usuario->id)
            ->get()
            ->first();
            $faculty=DB::table('faculties as f')
            ->select('f.id','f.nombre')
            ->get();
            $dificultad=DB::table('difficulties as d')
            ->select('d.id','d.nombre')
            ->get();
            $tipo_ejercicio=DB::table('typeexercises as te')
            ->select('te.id','te.nombre')
            ->get();

            return view('upload.index',["upload"=>$upload,"searchText"=>$query,"faculty"=>$faculty,
        "dificultad"=>$dificultad,"tipo_ejercicio"=>$tipo_ejercicio]);
        }

    }
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
        $faculty = Faculty::findOrfail($request->get('id_facultad'));
        $escuela = School::findOrfail($request->get('id_escuela'));
        $catedra = Cathedra::findOrfail($request->get('id_catedra'));
        $materia = Matter::findOrfail($request->get('id_materia'));
        $tema = Topic::findOrfail($request->get('id_tema'));
        $contenido = Content::findOrfail($request->get('id_contenido'));
        if($request->hasFile('file'))
    	{
            $upload->id_usuario = $usuario->id;
            $upload->usuario_creador= $usuario->name;
            $upload->usuario_modificador= $usuario->name;
            $upload->created_at = $hoy;
            $upload->updated_at = $hoy;
            $upload->id_facultad =$request->id_facultad;
            $upload->facultad =$faculty->nombre;
            $upload->id_escuela =$request->id_escuela;
            $upload->escuela =$escuela->nombre;
            $upload->id_catedra =$request->id_catedra;
            $upload->catedra =$catedra->nombre;
            $upload->id_materia =$request->id_materia;
            $upload->materia =$materia->nombre;
            $upload->id_tema =$request->id_tema;
            $upload->tema =$tema->nombre;
            $upload->id_contenido =$request->id_contenido;
            $upload->contenido =$contenido->nombre;
            $upload->id_categoria =$request->id_categoria;
            $upload->categoria =$request->id_categoria;
            if($usuario->id == 1 && $usuario->id == 2){
                $upload->aprobado = 1;
            }else{
                $upload->aprobado = 0;
            }
            $upload->titulo =$request->titulo;
            $upload->descripcion =$request->descripcion;
    		$imageFile = $request->file('file');
            $imageName = $imageFile->getClientOriginalName();
            $upload->tipo_archivo = $imageFile->getClientMimeType();
            $upload->ruta = 'uploads/'.$imageName;
            $upload->save();
            $imageFile->move(public_path('uploads'), $imageName);
        }
        
        return Redirect::to('materiales/digitalizados/subir');
    }
    public function downloadFile($id){
      $upload = Upload::findOrfail($id);;
      $pathtoFile = public_path()."/".$upload->ruta;
      return response()->download($pathtoFile);
    }
}
