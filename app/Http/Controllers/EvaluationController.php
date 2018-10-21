<?php

namespace gestion\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use gestion\Http\Requests\EvaluationFormRequest;
use gestion\models\Faculty;
use gestion\models\People;
use gestion\models\Teacher;
use gestion\models\School;
use gestion\models\Cathedra;
use gestion\models\Matter;
use gestion\models\Topic;
use gestion\models\Exercise;
use gestion\models\TemporaryEvaluation;
use gestion\models\ExerciseTemporaryEvaluation;
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

class EvaluationController extends Controller
{
    //
    public function index(){

        $usuario = Auth::user();

        $temporaryEvaluation = DB::table('temporaryevaluations as tem')
                            ->select('tem.*')
                            ->where("tem.id_usuario","=",$usuario->id)
                            ->get();
        $faculty=DB::table('faculties as f')
            ->select('f.id','f.nombre')
            ->get();
        
        return view("gestion.evaluacion.index",["faculty"=>$faculty,
        "temporaryEvaluation"=>$temporaryEvaluation]);
    }
    public function create(EvaluationFormRequest $request){

        $evaluation = new TemporaryEvaluation;
        //obtengo el  usuario
        $usuario = Auth::user();
        //obtengo la fecha de hopy 
        $hoy = date("Y-m-d H:i:s");
        //obtengo el nombre da tema,facultad,escuela ,catedra,etc..
        $faculty = Faculty::findOrfail($request->get('id_facultad'));
        $escuela = School::findOrfail($request->get('id_escuela'));
        $catedra = Cathedra::findOrfail($request->get('id_catedra'));
        $materia = Matter::findOrfail($request->get('id_materia'));
        $tema = Topic::findOrfail($request->get('id_tema'));
        $evaluation->id_facultad = $request->get('id_facultad');
        $evaluation->facultad = $faculty->nombre;
        $evaluation->id_escuela = $request->get('id_escuela');
        $evaluation->escuela = $escuela->nombre ;
        $evaluation->id_catedra = $request->get('id_catedra');
        $evaluation->catedra = $catedra->nombre;
        $evaluation->id_tema = $request->get('id_tema');
        $evaluation->tema = $tema->nombre;
        $evaluation->id_materia = $request->get('id_materia');
        $evaluation->materia = $materia->nombre ;                
        $evaluation->numero_evaluacion =$request->get('numero_evaluacion');
        $evaluation->id_tipo_evaluacion =$request->get('id_tipo_evaluacion');
        $evaluation->nombre_tipo_evaluacion =$request->get('id_tipo_evaluacion');
        $evaluation->id_subtipo_evaluacion =$request->get('id_subtipo_evaluacion');
        $evaluation->nombre_subtipo_evaluacion =$request->get('id_subtipo_evaluacion');
        $evaluation->fecha =$request->get('fecha');
        $evaluation->id_usuario = $usuario->id;
        $evaluation->aprobado = 1;
        if(Auth::check()){
            $evaluation->usuario_creador=$usuario->name;
            $evaluation->usuario_modificador= $usuario->name;
        }
        $evaluation->created_at = $hoy;
        $evaluation->updated_at = $hoy;
        $evaluation->save();

        return Redirect::to('crear/evaluacion/'.$evaluation->id);
    }
    public function crearEvaluacion($id){
        
        $evaluacion = TemporaryEvaluation::findOrfail($id);

        if($evaluacion->id_subtipo_evaluacion == 3){
             $ejercicio = DB::table('exercises as exx')
            ->select('exx.*')
            ->where('exx.id_tipo','=','1')
            ->orwhere('exx.id_tipo','=','2')
            ->orderBy('exx.id','asc')
            ->paginate(40);
        }else{
            $ejercicio = DB::table('exercises as exx')
            ->select('exx.*')
            ->where('exx.id_tipo','=',$evaluacion->id_subtipo_evaluacion)
            ->orderBy('exx.id','asc')
            ->paginate(40);
        }
         $exerciseTemporaryEvaluation = DB::table('exercisetemporaryevaluations as ext')
        ->join('exercises as ex','ext.id_ejercicio','=',"ex.id")
        ->select('ext.id','ex.*')
        ->get();

        $faculty=DB::table('faculties as f')
        ->select('f.*')
        ->get();
        $dificultad=DB::table('difficulties as d')
        ->select('d.id','d.nombre')
        ->get();
        $tipo_ejercicio=DB::table('typeexercises as te')
        ->select('te.id','te.nombre')
        ->get();

        return view("gestion.evaluacion.create",["ejercicio"=>$ejercicio,"faculty"=>$faculty,
           "dificultad"=>$dificultad,"tipo_ejercicio"=>$tipo_ejercicio,"id_temporal_evaluation"=>$id,
           "exerciseTemporaryEvaluation"=>$exerciseTemporaryEvaluation]);
    }
    public function editarEvaluacion($id){
        
        $evaluacion = TemporaryEvaluation::findOrfail($id);

        if($evaluacion->id_subtipo_evaluacion == 3){
             $ejercicio = DB::table('exercises as exx')
            ->select('exx.*')
            ->where('exx.id_tipo','=','1')
            ->orwhere('exx.id_tipo','=','2')
            ->orderBy('exx.id','asc')
            ->paginate(40);
        }else{
            $ejercicio = DB::table('exercises as exx')
            ->select('exx.*')
            ->where('exx.id_tipo','=',$evaluacion->id_subtipo_evaluacion)
            ->orderBy('exx.id','asc')
            ->paginate(40);
        }
         $exerciseTemporaryEvaluation = DB::table('exercisetemporaryevaluations as ext')
        ->join('exercises as ex','ext.id_ejercicio','=',"ex.id")
        ->select('ext.id','ex.*')
        ->get();

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

        $dificultad=DB::table('difficulties as d')
        ->select('d.id','d.nombre')
        ->get();
        $tipo_ejercicio=DB::table('typeexercises as te')
        ->select('te.id','te.nombre')
        ->get();

        return view("gestion.evaluacion.edit",["ejercicio"=>$ejercicio,"faculty"=>$faculty,
           "dificultad"=>$dificultad,"tipo_ejercicio"=>$tipo_ejercicio,"id_temporal_evaluation"=>$id,
           "exerciseTemporaryEvaluation"=>$exerciseTemporaryEvaluation,"evaluacion"=>$evaluacion,
           "escuela"=>$escuela,"catedra"=>$catedra,"materia"=>$materia,"tema"=>$tema]);
    }
    public function agregarEjercicio(Request $request){

        $exerciseTemporaryEvaluation = new ExerciseTemporaryEvaluation;
        //obtengo el  usuario
        $usuario = Auth::user();

        $exerciseTemporaryEvaluation->id_ejercicio = $request->get('id_ejercicio');
        $exerciseTemporaryEvaluation->id_temporal_evaluation = $request->get('id_temporal_evaluation');
        $exerciseTemporaryEvaluation->save();

        return back();
        
    }
}
