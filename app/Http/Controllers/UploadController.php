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
use gestion\User;
use File;
use DB;

/**
 * Controlador que se usa Para subir y descargar archivos
 */
class UploadController extends Controller
{
    /**
     * Verificamos que el usaurio este logiado 
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /** Lista Todos Los Archivos*/
    public function index(Request $request){
        //obtenemos el usuario 
        $usuario = Auth::user();

        //verificamo que haya respuesta 
        if($request){

            /**
             * verificamos el rol del usuario 
             * 1-Administrador
             * 2-profesor
             * 3-preparador         
             */
            if($usuario->id_cargo == 1 || $usuario->id_cargo == 2 ){
                $upload=DB::table('uploads as upl')
                ->select('upl.*')
                ->orderBy('upl.id','desc')
                ->paginate(40);
            }else{
                $upload=DB::table('uploads as upl')
                ->select('upl.*')
                ->join('users as us','upl.id_usuario','=',"us.id")
                ->join('roles as rol','us.id_cargo','=',"rol.id")
                ->where('rol.id','=',"3")
                ->orderBy('upl.id','desc')
                ->paginate(40);
            } 
            
            //Filtramos
            if($request->get('facultad') && $request->get('facultad') != '' ){
                $upload =  $upload->where('id_facultad','=',$request->get('facultad'));
            }
            if($request->get('dificultad') && $request->get('dificultad') != '' ){
                $upload =  $upload->where('id_dificultad','=',$request->get('dificultad'));
            }
            if($request->get('escuela') && $request->get('escuela') != '' ){
                $upload =  $upload->where('id_escuela','=',$request->get('escuela'));
            }
            if($request->get('catedra') && $request->get('catedra') != '' ){
                $upload =  $upload->where('id_catedra','=',$request->get('catedra'));
            }
            if($request->get('materia') && $request->get('materia') != '' ){
                $upload =  $upload->where('id_materia','=',$request->get('materia'));
            }
            if($request->get('contenido') && $request->get('contenido') != '' ){
                $upload =  $upload->where('id_contenido','=',$request->get('contenido'));
            }
            if($request->get('dificultad') && $request->get('dificultad') != '' ){
                $upload =  $upload->where('id_dificultad','=',$request->get('dificultad'));
            }
            if($request->get('tipo') && $request->get('tipo') != '' ){
                $upload =  $upload->where('id_tipo','=',$request->get('tipo'));
            }
            
            $faculty=DB::table('faculties as f')
            ->select('f.id','f.nombre')
            ->get();
            $dificultad=DB::table('difficulties as d')
            ->select('d.id','d.nombre')
            ->get();
            $tipo_ejercicio=DB::table('typeexercises as te')
            ->select('te.id','te.nombre')
            ->get();

            return view('upload.index',["upload"=>$upload,"faculty"=>$faculty,
        "dificultad"=>$dificultad,"tipo_ejercicio"=>$tipo_ejercicio]);
        }

    }
    public function miMaterialDigitalizado(Request $request){

        //obtenemos el usuario 
        $usuario = Auth::user();

        //verificamo que haya respuesta 
        if($request){

            /**
             * verificamos el rol del usuario 
             * 1-Administrador
             * 2-profesor
             * 3-preparador         
             */
            $upload=DB::table('uploads as upl')
            ->select('upl.*')
            ->where('upl.id_usuario','=',$usuario->id)
            ->orderBy('upl.id','desc')
            ->paginate(40);

            //Filtramos
            if($request->get('facultad') && $request->get('facultad') != '' ){
                $upload =  $upload->where('id_facultad','=',$request->get('facultad'));
            }
            if($request->get('dificultad') && $request->get('dificultad') != '' ){
                $upload =  $upload->where('id_dificultad','=',$request->get('dificultad'));
            }
            if($request->get('escuela') && $request->get('escuela') != '' ){
                $upload =  $upload->where('id_escuela','=',$request->get('escuela'));
            }
            if($request->get('catedra') && $request->get('catedra') != '' ){
                $upload =  $upload->where('id_catedra','=',$request->get('catedra'));
            }
            if($request->get('materia') && $request->get('materia') != '' ){
                $upload =  $upload->where('id_materia','=',$request->get('materia'));
            }
            if($request->get('contenido') && $request->get('contenido') != '' ){
                $upload =  $upload->where('id_contenido','=',$request->get('contenido'));
            }
            if($request->get('dificultad') && $request->get('dificultad') != '' ){
                $upload =  $upload->where('id_dificultad','=',$request->get('dificultad'));
            }
            if($request->get('tipo') && $request->get('tipo') != '' ){
                $upload =  $upload->where('id_tipo','=',$request->get('tipo'));
            }
            
            $faculty=DB::table('faculties as f')
            ->select('f.id','f.nombre')
            ->get();
            $dificultad=DB::table('difficulties as d')
            ->select('d.id','d.nombre')
            ->get();
            $tipo_ejercicio=DB::table('typeexercises as te')
            ->select('te.id','te.nombre')
            ->get();

            return view('upload.miMaterialDigitalizado',["upload"=>$upload,"faculty"=>$faculty,
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
        
        return Redirect::to('gestion/contenido/materiales/digitalizados/subir');
    }
    public function downloadFile($id){
      $upload = Upload::findOrfail($id);
      $pathtoFile = public_path()."/".$upload->ruta;
      return response()->download($pathtoFile);
    }

    public function delete($id){

        $upload = Upload::findOrfail($id);
        $pathtoFile = public_path()."/".$upload->ruta;

        if(file_exists(public_path($upload->ruta))){
          unlink(public_path($upload->ruta));
        }else{
          dd('El archivo no existe.');
        }
       return back();
    }
}
