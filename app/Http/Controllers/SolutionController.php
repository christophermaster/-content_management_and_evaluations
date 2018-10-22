<?php

namespace gestion\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
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
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $usuario = Auth::user();
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $solucion=DB::table('solutions as sol')
            ->select('sol.*')
            ->where('sol.id_usuario','=',$usuario->id)
            ->orderBy('sol.id','asc')
            ->paginate(10);
            
            $usuario=DB::table('users as user')
            ->select('user.*')
            ->get();

            if($request->get('usuario') && $request->get('usuario') != '' ){
                $solucion =  $solucion->where('id_usuario','=',$request->get('usuario'));
            }
            if($request->get('fecha_inicial') && $request->get('fecha_inicial') != '' &&
                $request->get('fecha_final') && $request->get('fecha_final') != ''  ){
                     $solucion =  $solucion->where('created_at','>=',$request->get('fecha_incial'))
                     ->where('created_at','<=',$request->get('fecha_final'));

            }else{

                if($request->get('fecha_inicial') && $request->get('fecha_inicial') != '' ){
                    $solucion =  $solucion->where('created_at','=',$request->get('fecha_inicial'));
                }
                if($request->get('fecha_final') && $request->get('fecha_final') != '' ){
                    $solucion =  $solucion->where('created_at','=',$request->get('fecha_final'));
                }
            }
            

            return view('gestion.solucion.index',["solucion"=>$solucion,"usuario"=>$usuario]);
        }

    }
    public function edit($id)
    {
        $solucion = Solution::findOrfail($id);
        return view("gestion.solucion.edit",["solucion"=>$solucion]);
    }
     public function update(SolutionRequest $request, $id)
    {
        $solucion = Solution::findOrfail($id);
        $usuario = Auth::user()->name;
        $hoy = date("Y-m-d H:i:s");  
        $solucion->contenido=$request->get('contenido');
        if(Auth::check()){
            $solucion->usuario_modificador= $usuario;
        }
        $solucion->updated_at = $hoy;
        $solucion->update();
        flash('Se actualizo de forma Correcta')->success();
        return Redirect::to('gestion/contenido/mis/publicaciones/ejercicios/detalles/'.$request->get('id_ejercicio'));
    }
    public function create($id)
    {
        /*$categorias = DB::table('categoria')->where('condicion','=','1')->get();*/
        return view("gestion.solucion.create",["id_ejercicio"=>$id]);
    }
    public function store (SolutionRequest $request)
    {
        $ejercicio = Exercise :: findOrfail($request->get('id_ejercicio'));
        $solucion = new Solution; 
        $usuario = Auth::user();
        $hoy = date("Y-m-d H:i:s");  
        if($ejercicio->id){

            if(Auth::check()){
                $solucion->usuario_creador=$usuario->name;
                $solucion->usuario_modificador= $usuario->name;
                $solucion->id_usuario= $usuario->id;
            }
            $solucion->id_ejercicio = $request->get('id_ejercicio');
            $solucion->created_at = $hoy;
            $solucion->updated_at = $hoy;
            $solucion->contenido = $request->get('contenido');
           
            if( $usuario->id_cargo == 1 ||  $usuario->id_cargo == 2){
                $solucion->aprobado = 1;
            } else{
                $solucion->aprobado = 0;
            }
            $solucion->save();  
            flash('Se guardo de forma Correcta')->success();
            return back() ;
        }
        flash('No se guardo de forma Correcta')->error();
        return back() ;

    }

    public function destroy($id)
    {
        Solution::destroy($id);
        flash('Se elimino Correctamente')->success();
        return back() ;

    }
    public function favorito($id){
        $solucion = Solution::findOrfail($id);
        if($solucion->favorito == 1){
            $solucion->favorito = 0;
        }else{
            $solucion->favorito = 1;
        }
        
        $solucion->update();
        return back();
    }

}
