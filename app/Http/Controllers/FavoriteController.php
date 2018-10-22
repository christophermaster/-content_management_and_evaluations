<?php

namespace gestion\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use gestion\Http\Requests\ExerciseRequest;
use gestion\models\Faculty;
use gestion\models\Favorite;
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

class FavoriteController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
      
    }
    /**Muestra todos los ejercicios  */
    public function favorito(Request $request){

        $usuario = Auth::user();
        if($request){
          
            $ejercicio=DB::table('exercises as exx')
            ->join("favorites as fav",'exx.id','=',"fav.id_ejercicio")
            ->select('exx.*','fav.id as id_favorito')
            ->where('fav.id_usuario','=', $usuario->id)
            ->orderBy('exx.id','asc')
            ->paginate(2);

            $solucion  = DB::table('solutions as sol')
            ->join("favorites as fav",'sol.id','=',"fav.id_solucion")
            ->select('sol.*','fav.id as id_favorito')
            ->where('fav.id_usuario','=',$usuario->id)
            ->orderBy('sol.id','asc')
            ->paginate(2);

            $upload  = DB::table('uploads as upl')
            ->join("favorites as fav",'upl.id','=',"fav.id_archivo")
            ->select('upl.*','fav.id as id_favorito')
            ->where('fav.id_usuario','=',$usuario->id)
            ->orderBy('upl.id','asc')
            ->paginate(2);
            
            if($request->get('facultad') && $request->get('facultad') != '' ){
                $ejercicio =  $ejercicio->where('id_facultad','=',$request->get('facultad'));
                $upload =  $upload->where('id_facultad','=',$request->get('facultad'));
                $solucion =  $solucion->where('id_facultad','=',$request->get('facultad'));
            }
            if($request->get('dificultad') && $request->get('dificultad') != '' ){
                $ejercicio =  $ejercicio->where('id_dificultad','=',$request->get('dificultad'));
                $upload =  $upload->where('id_dificultad','=',$request->get('dificultad'));
                $solucion =  $solucion->where('id_dificultad','=',$request->get('dificultad'));
            }
            if($request->get('escuela') && $request->get('escuela') != '' ){
                $ejercicio =  $ejercicio->where('id_escuela','=',$request->get('escuela'));
                $upload =  $upload->where('id_escuela','=',$request->get('escuela'));
                $solucion =  $solucion->where('id_escuela','=',$request->get('escuela'));
            }
            if($request->get('catedra') && $request->get('catedra') != '' ){
                $ejercicio =  $ejercicio->where('id_catedra','=',$request->get('catedra'));
                $upload =  $upload->where('id_catedra','=',$request->get('catedra'));
                $solucion =  $solucion->where('id_catedra','=',$request->get('catedra'));
            }
            if($request->get('materia') && $request->get('materia') != '' ){
                $ejercicio =  $ejercicio->where('id_materia','=',$request->get('materia'));
                $upload =  $upload->where('id_materia','=',$request->get('materia'));
                $solucion =  $solucion->where('id_materia','=',$request->get('materia'));
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

            if($request->get('usuario') && $request->get('usuario') != '' ){
                $ejercicio =  $ejercicio->where('id_usuario','=',$request->get('usuario'));
                $upload =  $upload->where('id_usuario','=',$request->get('usuario'));
                $solucion =  $solucion->where('id_usuario','=',$request->get('usuario'));
            }
            if($request->get('fecha_inicial') && $request->get('fecha_inicial') != '' &&
                $request->get('fecha_final') && $request->get('fecha_final') != ''  ){
                $ejercicio =  $ejercicio->where('created_at','>=',$request->get('fecha_incial'))
                ->where('created_at','<=',$request->get('fecha_final'));
                $upload =  $upload->where('created_at','>=',$request->get('fecha_incial'))
                ->where('created_at','<=',$request->get('fecha_final'));
                 $solucion =  $solucion->where('created_at','>=',$request->get('fecha_incial'))
                ->where('created_at','<=',$request->get('fecha_final'));

            }else{

                if($request->get('fecha_inicial') && $request->get('fecha_inicial') != '' ){
                    $ejercicio =  $ejercicio->where('created_at','=',$request->get('fecha_inicial'));
                     $upload =  $upload->where('created_at','=',$request->get('fecha_inicial'));
                     $solucion =  $solucion->where('created_at','=',$request->get('fecha_inicial'));
                }
                if($request->get('fecha_final') && $request->get('fecha_final') != '' ){
                    $ejercicio =  $ejercicio->where('created_at','=',$request->get('fecha_final'));
                    $upload =  $upload->where('created_at','=',$request->get('fecha_final'));
                    $solucion =  $solucion->where('created_at','=',$request->get('fecha_final'));
                }
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
            $usuario=DB::table('users as user')
            ->select('user.*')
            ->get();

        return view('favorito.index',["ejercicio"=>$ejercicio,
        "cantEjercicio"=>$cantEjercicio,"cantSoluciones"=>$cantSoluciones,"faculty"=>$faculty,
        "dificultad"=>$dificultad,"tipo_ejercicio"=>$tipo_ejercicio,"solucion"=>$solucion,
        "upload" => $upload,"usuario"=>$usuario]);

        }
    }

    public function agregarFavoriteEjercicio($id){
        $usuario = Auth::user();
        $favorite = new Favorite;
        $verificar =DB::table('favorites as fav')
        ->select('fav.*')
        ->where('fav.id_usuario','=', $usuario->id)
        ->where('fav.id_ejercicio','=',$id)
        ->get();

        if(count($verificar) == 0){
            $favorite->id_usuario =  $usuario->id;
            $favorite->id_ejercicio = $id;
            $favorite->save();
            flash('Se guardado en los favoritos')->success();
        }else{
            flash('Ya se encuentra guardado en los favoritos')->error();
        }
        return back();
    }

    public function agregarFavoriteSolucion($id){
        $usuario = Auth::user();
        $favorite = new Favorite;
        $verificar =DB::table('favorites as fav')
        ->select('fav.*')
        ->where('fav.id_usuario','=', $usuario->id)
        ->where('fav.id_solucion','=',$id)
        ->get();

        if(count($verificar) == 0){
            $favorite->id_usuario =  $usuario->id;
            $favorite->id_solucion = $id;
            $favorite->save();
            flash('Se guardado en los favoritos')->success();
        }else{
            flash('Ya se encuentra guardado en los favoritos')->error();
        }
        return back();
    }
     public function agregarFavoriteArchivo($id){
        $usuario = Auth::user();
        $favorite = new Favorite;
        $verificar =DB::table('favorites as fav')
        ->select('fav.*')
        ->where('fav.id_usuario','=', $usuario->id)
        ->where('fav.id_archivo','=',$id)
        ->get();

        if(count($verificar) == 0){
            $favorite->id_usuario =  $usuario->id;
            $favorite->id_archivo = $id;
            $favorite->save();
            flash('Se guardado en los favoritos')->success();
        }else{
            flash('Ya se encuentra guardado en los favoritos')->error();
        }
        return back();
    }

    public function quitarFavorite($id){

        Favorite::destroy($id);
        flash('Se elimino Correctamente')->success();
        return back() ;
    }

 
   
}
