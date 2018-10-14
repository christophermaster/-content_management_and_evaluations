<?php

namespace gestion\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use gestion\Http\Requests\ExerciseRequest;
use gestion\models\Faculty;
use gestion\models\People;
use gestion\models\Teacher;
use gestion\User;
use gestion\models\School;
use gestion\models\Cathedra;
use gestion\models\Matter;
use gestion\models\Topic;
use gestion\models\Exercise;
use gestion\models\TypeExercise;
use gestion\models\Difficulty;
use gestion\models\Content;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Middleware\Authenticate;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use DB;

class ExerciseController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(Request $request)
    {
      

    }

    /**
     * Funcion que nos permite mostrar todos nuestros ejercicios con soluciones y sus detalles 
     */
    public function todosMisEjercicios(){
        $usuario = Auth::user();
        $ejercicio=DB::table('exercises as exx')
            ->join('example_and_solutions as es','exx.id','=',"es.id_ejercicio")
            ->join('solutions as sol','sol.id','=',"es.id_solucion")
            ->select('es.id_ejercicio','es.id as esID', 'exx.*',
            'sol.contenido as contSol' )
            ->groupBy("es.id_ejercicio")
            ->where('exx.id_usuario','=', $usuario->id)
            ->orderBy('es.id','asc')
            ->paginate(10);
    
       return view('gestion.ejercicio.ejercicios',["ejercicio"=>$ejercicio]);
    }
    //Muestra la vista de creacion de ejercicio 
    public function create()
    {
        $faculty=DB::table('faculties as f')
        ->select('f.id','f.nombre')
        ->get();
        $dificultad=DB::table('difficulties as d')
        ->select('d.id','d.nombre')
        ->get();
        $tipo_ejercicio=DB::table('typeexercises as te')
        ->select('te.id','te.nombre')
        ->get();
        return view("gestion.ejercicio.create",["faculty"=>$faculty,"dificultad"=>$dificultad,"tipo_ejercicio"=>$tipo_ejercicio]);
    }
    //funcion que se encarga de guardar los ejercicios 
    public function store (ExerciseRequest $request)
    {
        //obtengo el nombre del usuario
        $usuario = Auth::user()->name;
        //obtengo el id del usuario
        $id = Auth::user()->id;
        //obtengo la fecha de hopy 
        $hoy = date("Y-m-d H:i:s");
        //obtengo el nombre da tema,facultad,escuela ,catedra,etc..
        $faculty = Faculty::findOrfail($request->get('id_facultad'));
        $escuela = School::findOrfail($request->get('id_escuela'));
        $catedra = Cathedra::findOrfail($request->get('id_catedra'));
        $materia = Matter::findOrfail($request->get('id_materia'));
        $tema = Topic::findOrfail($request->get('id_tema'));
        $contenido = Content::findOrfail($request->get('id_contenido'));
        $dificultad = Difficulty::findOrfail($request->get('id_dificultad'));
        $tipo = TypeExercise::findOrfail($request->get('id_tipo'));
    
        //instanceo el modelo y le asiganos sus valores para guardarl0
        $exercise = new Exercise;
        $exercise->contenido = $request->get('contenido');
        $exercise->id_tema = $request->get('id_tema');
        $exercise->id_contenido = $request->get('id_contenido');
        $exercise->id_facultad = $request->get('id_facultad');
        $exercise->id_usuario =  $id;
        $exercise->id_catedra = $request->get('id_catedra');
        $exercise->id_escuela = $request->get('id_escuela');
        $exercise->id_materia = $request->get('id_materia');
        $exercise->id_dificultad = $request->get('id_dificultad');
        $exercise->id_tipo = $request->get('id_tipo');
        $exercise->materia = $materia->nombre ;
        $exercise->escuela = $escuela->nombre ;
        $exercise->facultad = $faculty->nombre;
        $exercise->catedra = $catedra->nombre;
        $exercise->dificultad = $dificultad->nombre ;
        $exercise->tipo_nombre = $tipo->nombre ;
        $exercise->nombre_contenido = $contenido->nombre;
    
        $exercise->tema = $tema->nombre;
        $exercise->aprobado = 1;
        if(Auth::check()){
            $exercise->usuario_creador=$usuario;
            $exercise->usuario_modificador= $usuario;
        }
        $exercise->created_at = $hoy;
        $exercise->updated_at = $hoy;
        $exercise->save();

        flash('Se guardo de forma Correcta')->success();

        $faculty=DB::table('faculties as f')
        ->select('f.id','f.nombre')
        ->get();
        $dificultad=DB::table('difficulties as d')
        ->select('d.id','d.nombre')
        ->get();
          $tipo_ejercicio=DB::table('typeexercises as te')
        ->select('te.id','te.nombre')
        ->get();
        return view("gestion.ejercicio.create",["faculty"=>$faculty,"dificultad"=>$dificultad,"tipo_ejercicio"=>$tipo_ejercicio]);
    
    }
    public function show($id)
    {
       /* return view("almacen.articulo.show",["articulo"=>Articulo::findOrFail($id)]);*/
    }
    public function edit($id)
    {
       /* $faculty = Faculty::findOrfail($id);
        return view("administration.user.edit",["faculty"=>$faculty]);*/
    }
    public function update(FacultyFormRequest $request, $id)
    {
      /*  $faculty = Faculty::findOrfail($id);
        $usuario = Auth::user()->name;
        $hoy = date("Y-m-d H:i:s");  
        $faculty->nombre=$request->get('nombre');
        $faculty->descripcion=$request->get('descripcion');
        if(Auth::check()){
            $faculty->usuario_modificador= $usuario;
        }
        $faculty->updated_at = $hoy;
        $faculty->update();
        return Redirect::to('administracion/facultad');*/
    }
    public function destroy($id)
    {
       /* $faculty= Articulo::findOrFail($id);
        $faculty->estado='Inactivo';
        $faculty->update();
        return Redirect::to('almacen/articulo');*/
    }
}
