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
use gestion\models\NumberEvaluation;
use gestion\models\SubtypeEvaluation;
use gestion\models\TypeEvaluation;
use gestion\models\Content;
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

        $tipo_evaluacion=DB::table('type_evaluations as t')
            ->select('t.id','t.nombre')
            ->get();

        $subtipo_evaluacion=DB::table('subtype_evaluations as s')
            ->select('s.id','s.nombre')
            ->get();    

        $numero_evaluacion=DB::table('number_evaluations as n')
            ->select('n.id','n.nombre')
            ->get();            
            
        return view("gestion.evaluacion.index",["faculty"=>$faculty,
        "temporaryEvaluation"=>$temporaryEvaluation,"tipo_evaluacion"=>$tipo_evaluacion,
        "subtipo_evaluacion"=>$subtipo_evaluacion,"numero_evaluacion"=>$numero_evaluacion]);
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
        $numberEvaluation = NumberEvaluation::findOrfail($request->get('numero_evaluacion'));
        $subtypeEvaluation = SubtypeEvaluation::findOrfail($request->get('id_subtipo_evaluacion'));
        $typeEvaluation = TypeEvaluation::findOrfail($request->get('id_tipo_evaluacion'));

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
        $evaluation->numero_evaluacion =$numberEvaluation->nombre;
        $evaluation->id_tipo_evaluacion =$request->get('id_tipo_evaluacion');
        $evaluation->nombre_tipo_evaluacion =$typeEvaluation->nombre;
        $evaluation->id_subtipo_evaluacion =$request->get('id_subtipo_evaluacion');
        $evaluation->nombre_subtipo_evaluacion =$subtypeEvaluation->nombre;
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

        $tipo_evaluacion=DB::table('type_evaluations as t')
        ->select('t.id','t.nombre')
        ->get();

        $subtipo_evaluacion=DB::table('subtype_evaluations as s')
            ->select('s.id','s.nombre')
            ->get();    

        $numero_evaluacion=DB::table('number_evaluations as n')
            ->select('n.id','n.nombre')
            ->get();  

        return view("gestion.evaluacion.edit",["ejercicio"=>$ejercicio,"faculty"=>$faculty,
           "dificultad"=>$dificultad,"tipo_ejercicio"=>$tipo_ejercicio,"id_temporal_evaluation"=>$id,
           "exerciseTemporaryEvaluation"=>$exerciseTemporaryEvaluation,"evaluacion"=>$evaluacion,
           "escuela"=>$escuela,"catedra"=>$catedra,"materia"=>$materia,"tema"=>$tema,
           "tipo_evaluacion"=>$tipo_evaluacion, "subtipo_evaluacion"=>$subtipo_evaluacion,
           "numero_evaluacion"=>$numero_evaluacion]);
    }
    public function eliminarParcial($id){

        TemporaryEvaluation::destroy($id);
        flash('Se elimino Correctamente')->success();
        return back() ;

    }
    public function modificarParcial(EvaluationFormRequest $request,$id){

        $temporaryEvaluation = TemporaryEvaluation::findOrfail($id);
        $usuario = Auth::user();
        $hoy = date("Y-m-d H:i:s");  
        //obtengo el nombre da tema,facultad,escuela ,catedra,etc..
        $faculty = Faculty::findOrfail($request->get('id_facultad'));
        $escuela = School::findOrfail($request->get('id_escuela'));
        $catedra = Cathedra::findOrfail($request->get('id_catedra'));
        $materia = Matter::findOrfail($request->get('id_materia'));
        $tema = Topic::findOrfail($request->get('id_tema'));
        $numberEvaluation = NumberEvaluation::findOrfail($request->get('numero_evaluacion'));
        $subtypeEvaluation = SubtypeEvaluation::findOrfail($request->get('id_subtipo_evaluacion'));
        $typeEvaluation = TypeEvaluation::findOrfail($request->get('id_tipo_evaluacion'));
        $temporaryEvaluation->id_facultad = $request->get('id_facultad');
        $temporaryEvaluation->facultad = $faculty->nombre;
        $temporaryEvaluation->id_escuela = $request->get('id_escuela');
        $temporaryEvaluation->escuela = $escuela->nombre ;
        $temporaryEvaluation->id_catedra = $request->get('id_catedra');
        $temporaryEvaluation->catedra = $catedra->nombre;
        $temporaryEvaluation->id_tema = $request->get('id_tema');
        $temporaryEvaluation->tema = $tema->nombre;
        $temporaryEvaluation->id_materia = $request->get('id_materia');
        $temporaryEvaluation->materia = $materia->nombre ;                
        $temporaryEvaluation->numero_evaluacion =$numberEvaluation->nombre;
        $temporaryEvaluation->id_tipo_evaluacion =$request->get('id_tipo_evaluacion');
        $temporaryEvaluation->nombre_tipo_evaluacion =$typeEvaluation->nombre;
        $temporaryEvaluation->id_subtipo_evaluacion =$request->get('id_subtipo_evaluacion');
        $temporaryEvaluation->nombre_subtipo_evaluacion =$subtypeEvaluation->nombre;
        $temporaryEvaluation->fecha =$request->get('fecha');
        $temporaryEvaluation->aprobado = 1;
        if(Auth::check()){
            $temporaryEvaluation->usuario_modificador= $usuario->name;
        }
        $temporaryEvaluation->updated_at = $hoy;
        $temporaryEvaluation->update();
        return back();

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
