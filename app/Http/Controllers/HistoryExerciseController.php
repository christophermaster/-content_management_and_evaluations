<?php

namespace gestion\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use gestion\Http\Requests\ExerciseRequest;
use gestion\models\Faculty;
use gestion\models\People;
use gestion\models\Teacher;
use gestion\models\School;
use gestion\models\Cathedra;
use gestion\models\Matter;
use gestion\models\Topic;
use gestion\models\Exercise;
use gestion\models\TypeExercise;
use gestion\models\Difficulty;
use gestion\models\Content;
use gestion\models\Upload;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Middleware\Authenticate;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use DB;
use gestion\User;

class HistoryExerciseController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        //obtengo el usuario 
        $usuario = Auth::user();
        //obtengo la fecha de hopy 
        $ano = date("Y");
        $mes = date("m");
        $dia = date("d");
        $ano = $ano -1;
        $fecha = $ano."-".$mes."-".$dia;
        if($request){

            //obtengo los ejercicios 
            $ejercicioUsado=DB::table('exercises as exx')
                ->select('exx.*')
                ->where('exx.usado','=', "1")->get();
                
               
            $ejercicioViejos=DB::table('exercises as exx')
                ->select('exx.*')
                ->where('created_at','<=', $fecha)->get();

            $upload=DB::table('uploads as upl')
            ->select('upl.*')
            ->where('created_at','<=', $fecha)->get();

            //Para llenar los select
            $faculty=DB::table('faculties as f')
            ->select('f.id','f.nombre')
            ->get();
            $dificultad=DB::table('difficulties as d')
            ->select('d.id','d.nombre')
            ->get();
            $tipo_ejercicio=DB::table('typeexercises as te')
            ->select('te.id','te.nombre')
            ->get();
             $usuario=DB::table('users as user')
            ->select('user.*')
            ->get();

            if($request->get('usuario') && $request->get('usuario') != '' ){
                $ejercicioUsado =  $ejercicioUsado->where('id_usuario','=',$request->get('usuario'));
                $ejercicioViejos =  $ejercicioViejos->where('id_usuario','=',$request->get('usuario'));
                $upload =  $upload->where('id_usuario','=',$request->get('usuario'));
        
            }
            if($request->get('fecha_inicial') && $request->get('fecha_inicial') != '' &&
                $request->get('fecha_final') && $request->get('fecha_final') != ''  ){

                $ejercicioUsado =  $ejercicioUsado->where('created_at','>=',$request->get('fecha_incial'))
                ->where('created_at','<=',$request->get('fecha_final'));

                 $ejercicioViejos =  $ejercicioViejos->where('created_at','>=',$request->get('fecha_incial'))
                ->where('created_at','<=',$request->get('fecha_final'));

                $upload =  $upload->where('created_at','>=',$request->get('fecha_incial'))
                ->where('created_at','<=',$request->get('fecha_final'));
               

            }else{

                if($request->get('fecha_inicial') && $request->get('fecha_inicial') != '' ){
                    $ejercicioUsado =  $ejercicioUsado->where('created_at','=',$request->get('fecha_inicial'));
                    $ejercicioViejos =  $ejercicioViejos->where('created_at','=',$request->get('fecha_inicial'));
                    $upload =  $upload->where('created_at','=',$request->get('fecha_inicial'));
                    
                }
                if($request->get('fecha_final') && $request->get('fecha_final') != '' ){
                    $ejercicioUsado =  $ejercicioUsado->where('created_at','=',$request->get('fecha_final'));
                    $ejercicioViejos =  $ejercicioViejos->where('created_at','=',$request->get('fecha_final'));
                    $upload =  $upload->where('created_at','=',$request->get('fecha_final'));
                    
                }
            }

            // comenzar a filtara por ejercicioUsados 
            if($request->get('facultad') && $request->get('facultad') != '' ){
                $ejercicioUsado =  $ejercicioUsado->where('id_facultad','=',$request->get('facultad'));
                $ejercicioViejos =  $ejercicioViejos->where('id_facultad','=',$request->get('facultad'));
                $upload =  $upload->where('id_facultad','=',$request->get('facultad'));
               
            }
            if($request->get('tema') && $request->get('tema') != '' ){
                $ejercicioUsado =  $ejercicioUsado->where('id_tema','=',$request->get('tema'));
                $ejercicioViejos =  $ejercicioViejos->where('id_tema','=',$request->get('tema'));
            }
            if($request->get('escuela') && $request->get('escuela') != '' ){
                $ejercicioUsado =  $ejercicioUsado->where('id_escuela','=',$request->get('escuela'));
                $ejercicioViejos =  $ejercicioViejos->where('id_escuela','=',$request->get('escuela'));
                $upload =  $upload->where('id_escuela','=',$request->get('escuela'));
                
                
            }
            if($request->get('catedra') && $request->get('catedra') != '' ){
                $ejercicioUsado =  $ejercicioUsado->where('id_catedra','=',$request->get('catedra'));
                $ejercicioViejos =  $ejercicioViejos->where('id_catedra','=',$request->get('catedra'));
                $upload =  $upload->where('id_catedra','=',$request->get('catedra'));
         
            }
            if($request->get('materia') && $request->get('materia') != '' ){
                $ejercicioUsado =  $ejercicioUsado->where('id_materia','=',$request->get('materia'));
                $ejercicioViejos =  $ejercicioViejos->where('id_materia','=',$request->get('materia'));
                $upload =  $upload->where('id_materia','=',$request->get('materia'));
         
            }
            if($request->get('contenido') && $request->get('contenido') != '' ){
                $ejercicioUsado =  $ejercicioUsado->where('id_contenido','=',$request->get('contenido'));
                $ejercicioViejos =  $ejercicioViejos->where('id_contenido','=',$request->get('contenido'));
                $upload =  $upload->where('id_contenido','=',$request->get('contenido'));
             
            }
            if($request->get('dificultad') && $request->get('dificultad') != '' ){
                $ejercicioUsado =  $ejercicioUsado->where('id_dificultad','=',$request->get('dificultad'));
                $ejercicioViejos =  $ejercicioViejos->where('id_dificultad','=',$request->get('dificultad'));
               
            }
            if($request->get('tipo') && $request->get('tipo') != '' ){
                $ejercicioUsado =  $ejercicioUsado->where('id_tipo','=',$request->get('tipo'));
                $ejercicioViejos =  $ejercicioViejos->where('id_tipo','=',$request->get('tipo'));
                $upload =  $upload->where('id_tipo','=',$request->get('tipo'));
   
            }


            return view("gestion.ejercicio.historiaEjercicios",["ejercicioUsado"=>$ejercicioUsado,"faculty"=>$faculty,
          "dificultad"=>$dificultad,"tipo_ejercicio"=>$tipo_ejercicio,"usuario"=>$usuario,
          "ejercicioViejos"=>$ejercicioViejos,"upload"=>$upload]);
        }
      
    }

    public function actualizarFecha($id){
        $ejercicio = Exercise::findOrfail($id);
        $usuario = Auth::user();
        $hoy = date("Y-m-d");
        $ejercicio->created_at =  $hoy;
        $ejercicio->usuario_modificador = $usuario->name;
        $ejercicio->update();

        return back();

    }

    public function usarEjercicio($id){
        $ejercicio = Exercise::findOrfail($id);
        $usuario = Auth::user();
        $hoy = date("Y-m-d");
        $ejercicio->updated_at =  $hoy;
        $ejercicio->usuario_modificador = $usuario->name;
        $ejercicio->usado = 0;
        $ejercicio->update();

        return back();

    }

    /**Detalles de los ejercicios */
    public function detallesDeEjercicios($id){
        $ejercicio = Exercise::findOrfail($id);
        $solucion  = DB::table('solutions as sol')
            ->select('sol.*')
            ->where('sol.id_ejercicio','=', $id)->get();
        return view("gestion.ejercicio.detallesEjercicio",["ejercicio"=>$ejercicio,"solucion"=>$solucion]);
    }

    /**
     * Funcion que nos permite mostrar todos nuestros ejercicios con soluciones y sus detalles 
     */

    public function todosMisEjercicios(Request $request){
        
        $usuario = Auth::user();
        $ejercicio=DB::table('exercises as exx')
            ->join('solutions as sol','sol.id_ejercicio','=',"exx.id")
            ->select('sol.id as esID',
            'sol.contenido as contSol', 'exx.*' )
            ->groupBy("exx.id")
            ->where('exx.id_usuario','=', $usuario->id)
            ->orderBy('exx.id','desc')
            ->paginate(10);

        if($request->get('facultad') && $request->get('facultad') != '' ){
            $ejercicio =  $ejercicio->where('id_facultad','=',$request->get('facultad'));
        }
        if($request->get('dificultad') && $request->get('dificultad') != '' ){
            $ejercicio =  $ejercicio->where('id_dificultad','=',$request->get('dificultad'));
        }
        if($request->get('escuela') && $request->get('escuela') != '' ){
            $ejercicio =  $ejercicio->where('id_escuela','=',$request->get('escuela'));
        }
        if($request->get('catedra') && $request->get('catedra') != '' ){
            $ejercicio =  $ejercicio->where('id_catedra','=',$request->get('catedra'));
        }
        if($request->get('materia') && $request->get('materia') != '' ){
            $ejercicio =  $ejercicio->where('id_materia','=',$request->get('materia'));
        }
        if($request->get('contenido') && $request->get('contenido') != '' ){
            $ejercicio =  $ejercicio->where('id_contenido','=',$request->get('contenido'));
        }
        if($request->get('dificultad') && $request->get('dificultad') != '' ){
            $ejercicio =  $ejercicio->where('id_dificultad','=',$request->get('dificultad'));
        }
        if($request->get('tipo') && $request->get('tipo') != '' ){
            $ejercicio =  $ejercicio->where('id_tipo','=',$request->get('tipo'));
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

        $cantfavorites = DB::table('favorites as fav')
        ->select(DB::raw('count(*) as cantidad'))
        ->where('fav.id_usuario','=', $usuario->id)
        ->get()
        ->first();

         $cantUpdate = DB::table('uploads as up')
        ->select(DB::raw('count(*) as cantidad'))
        ->where('up.id_usuario','=', $usuario->id)
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
       return view('gestion.ejercicio.historial',["ejercicio"=>$ejercicio,
       "cantEjercicio"=>$cantEjercicio,"cantSoluciones"=>$cantSoluciones,"faculty"=>$faculty,
       "dificultad"=>$dificultad,"tipo_ejercicio"=>$tipo_ejercicio,"cantfavorites"=>$cantfavorites,
       "cantUpdate"=>$cantUpdate]);
    }

    /**Muestra todos los ejercicios  */
    public function todosLosEjercicios(Request $request){

        $usuario = Auth::user();
        if($request){

            if($usuario->id_cargo == 1 || $usuario->id_cargo == 2 ){
                $ejercicio=DB::table('exercises as exx')
                ->select('exx.*')
                ->orderBy('exx.id','desc')
                ->paginate(2);

                 $solucion  = DB::table('solutions as sol')
                ->select('sol.*')
                ->where('sol.id_usuario','=',$usuario->id)->get();
            }else{
                $ejercicio=DB::table('exercises as exx')
                ->select('exx.*')
                ->join('users as us','exx.id_usuario','=',"us.id")
                ->join('roles as rol','us.id_cargo','=',"rol.id")
                ->where('rol.id','=',"3")
                ->orderBy('exx.id','desc')
                ->paginate(2);

                $solucion  = DB::table('solutions as sol')
                ->select('sol.*')
                ->where('sol.id_usuario','=','3')->get();
            }

            if($request->get('facultad') && $request->get('facultad') != '' ){
            $ejercicio =  $ejercicio->where('id_facultad','=',$request->get('facultad'));
            }
            if($request->get('dificultad') && $request->get('dificultad') != '' ){
                $ejercicio =  $ejercicio->where('id_dificultad','=',$request->get('dificultad'));
            }
            if($request->get('escuela') && $request->get('escuela') != '' ){
                $ejercicio =  $ejercicio->where('id_escuela','=',$request->get('escuela'));
            }
            if($request->get('catedra') && $request->get('catedra') != '' ){
                $ejercicio =  $ejercicio->where('id_catedra','=',$request->get('catedra'));
            }
            if($request->get('materia') && $request->get('materia') != '' ){
                $ejercicio =  $ejercicio->where('id_materia','=',$request->get('materia'));
            }
            if($request->get('contenido') && $request->get('contenido') != '' ){
                $ejercicio =  $ejercicio->where('id_contenido','=',$request->get('contenido'));
            }
            if($request->get('dificultad') && $request->get('dificultad') != '' ){
                $ejercicio =  $ejercicio->where('id_dificultad','=',$request->get('dificultad'));
            }
            if($request->get('tipo') && $request->get('tipo') != '' ){
                $ejercicio =  $ejercicio->where('id_tipo','=',$request->get('tipo'));
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

        return view('gestion.ejercicio.todo',["ejercicio"=>$ejercicio,
        "cantEjercicio"=>$cantEjercicio,"cantSoluciones"=>$cantSoluciones,"faculty"=>$faculty,
        "dificultad"=>$dificultad,"tipo_ejercicio"=>$tipo_ejercicio,"solucion"=>$solucion]);

        }
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
        $exercise->dificultad = $dificultad->nombre;
        $exercise->tipo_nombre = $tipo->nombre ;
        $exercise->nombre_contenido = $contenido->nombre;
        $exercise->usado = 0;
    
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
        //return view("gestion.ejercicio.create",["faculty"=>$faculty,"dificultad"=>$dificultad,"tipo_ejercicio"=>$tipo_ejercicio]);
        return back();
    }

    public function show($id)
    {
       /* return view("almacen.articulo.show",["articulo"=>Articulo::findOrFail($id)]);*/
    }
    public function edit($id)
    {
        $ejercicio = Exercise::findOrfail($id);

        $faculty=DB::table('faculties as f')
        ->select('f.*')
        ->get();
        $escuela=DB::table('schools as e')
        ->select('e.*')
        ->get();
        $catedra=DB::table('cathedras as c')
        ->select('c.*')
        ->get();
        $materia=DB::table('matters as m')
        ->select('m.*')
        ->get();
        $tema=DB::table('topics as t')
        ->select('t.*')
        ->get();
        $contenido=DB::table('contents as t')
        ->select('t.*')
        ->get();
        $dificultad=DB::table('difficulties as d')
        ->select('d.id','d.nombre')
        ->get();
        $tipo_ejercicio=DB::table('typeexercises as te')
        ->select('te.id','te.nombre')
        ->get();
        return view("gestion.ejercicio.edit",["faculty"=>$faculty,
           "dificultad"=>$dificultad,"tipo_ejercicio"=>$tipo_ejercicio,
           "escuela"=>$escuela,"catedra"=>$catedra,"materia"=>$materia,"tema"=>$tema,
           "contenido"=>$contenido,"ejercicio"=>$ejercicio]);
    }
    public function update(ExerciseRequest $request, $id)
    {
        //obtengo el nombre del usuario
        $usuario = Auth::user();
        //obtengo el id del usuario
        $exercise = Exercise::findOrfail($id);
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
    
        $exercise->contenido = $request->get('contenido');
        $exercise->id_tema = $request->get('id_tema');
        $exercise->id_contenido = $request->get('id_contenido');
        $exercise->id_facultad = $request->get('id_facultad');
        $exercise->id_catedra = $request->get('id_catedra');
        $exercise->id_escuela = $request->get('id_escuela');
        $exercise->id_materia = $request->get('id_materia');
        $exercise->id_dificultad = $request->get('id_dificultad');
        $exercise->id_tipo = $request->get('id_tipo');
        $exercise->materia = $materia->nombre ;
        $exercise->escuela = $escuela->nombre ;
        $exercise->facultad = $faculty->nombre;
        $exercise->catedra = $catedra->nombre;
        $exercise->dificultad = $dificultad->nombre;
        $exercise->tipo_nombre = $tipo->nombre ;
        $exercise->nombre_contenido = $contenido->nombre;
        $exercise->tema = $tema->nombre;
        $exercise->aprobado = 1;
        if(Auth::check()){
            $exercise->usuario_modificador= $usuario->name;
        }
        $exercise->updated_at = $hoy;
        $exercise->update();

        flash('Se Actualizo Correctamente')->success();

        $ejercicio = Exercise::findOrfail($id);
        $solucion  = DB::table('solutions as sol')
            ->select('sol.*')
            ->where('sol.id_ejercicio','=', $id)->get();
        return view("gestion.ejercicio.detallesEjercicio",["ejercicio"=>$ejercicio,"solucion"=>$solucion]);
    }
    public function destroy($id)
    {
        Exercise::destroy($id);
         //obtengo el usuario 
        $usuario = Auth::user();
        //obtengo los ejercicios 
        $ejercicio=DB::table('exercises as exx')
            ->select('exx.*')
            ->where('exx.id_usuario','=', $usuario->id)
            ->orderBy('exx.id','desc')
            ->paginate(10);
        $upload = DB::table('uploads as upl')
            ->select('upl.*')
            ->where('upl.id_usuario','=', $usuario->id)
            ->where('upl.id_categoria','=', "1")
            ->orderBy('upl.id','desc')
            ->paginate(10);
        //Para llenar los select
        $faculty=DB::table('faculties as f')
        ->select('f.id','f.nombre')
        ->get();
        $dificultad=DB::table('difficulties as d')
        ->select('d.id','d.nombre')
        ->get();
        $tipo_ejercicio=DB::table('typeexercises as te')
        ->select('te.id','te.nombre')
        ->get();
        flash('Se elimino Correctamente')->success();
        return view("gestion.ejercicio.soloEjercicios",["ejercicio"=>$ejercicio,"upload"=>$upload,"faculty"=>$faculty,
          "dificultad"=>$dificultad,"tipo_ejercicio"=>$tipo_ejercicio]);
    }

    public function favorito($id){
        $exercise = Exercise::findOrfail($id);
        if($exercise->favorito == 1){
            $exercise->favorito = 0;
        }else{
            $exercise->favorito = 1;
        }
        
        $exercise->update();
        return back();
    }
}
