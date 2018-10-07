<?php

namespace gestion\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use gestion\Http\Requests\FacultyFormRequest;
use gestion\models\Faculty;
use gestion\models\School;
use gestion\models\Cathedra;
use gestion\models\Matter;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use DB;

class AdminUserController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(Request $request)
    {
        if ($request)
        {
            $faculty=DB::table('faculties as f')
            ->select('f.id','f.nombre')
            ->get();
            return view('administration.user.index',["faculty"=>$faculty]);
        }

    }

    public function getSchool(Request $request, $id){
        if($request->ajax()){
            $school = School::schools($id);
            return response()->json($school);
        }
    }

    public function getCathedra(Request $request, $id){
        if($request->ajax()){
            $school = Cathedra::cathedras($id);
            return response()->json($school);
        }
    }

    public function getMatter(Request $request, $id){
        if($request->ajax()){
            $school = Matter::matters($id);
            return response()->json($school);
        }
    }


    public function create()
    {
        /*$categorias = DB::table('categoria')->where('condicion','=','1')->get();*/
        return view("administration.university.faculty.create");
    }
    public function store (FacultyFormRequest $request)
    {
        $faculty=new Faculty;
        $usuario = Auth::user()->name;
        $hoy = date("Y-m-d H:i:s");  
        $faculty->nombre=$request->get('nombre');
        $faculty->descripcion=$request->get('descripcion');
        if(Auth::check()){
            $faculty->usuario_creador=$usuario;
            $faculty->usuario_modificador= $usuario;
        }
        $faculty->created_at = $hoy;
        $faculty->updated_at = $hoy;
        $faculty->save();
        return Redirect::to('administracion/facultad');

    }
    public function show($id)
    {
       /* return view("almacen.articulo.show",["articulo"=>Articulo::findOrFail($id)]);*/
    }
    public function edit($id)
    {
        $faculty = Faculty::findOrfail($id);
        return view("administration.university.faculty.edit",["faculty"=>$faculty]);
    }
    public function update(FacultyFormRequest $request, $id)
    {
        $faculty = Faculty::findOrfail($id);
        $usuario = Auth::user()->name;
        $hoy = date("Y-m-d H:i:s");  
        $faculty->nombre=$request->get('nombre');
        $faculty->descripcion=$request->get('descripcion');
        if(Auth::check()){
            $faculty->usuario_modificador= $usuario;
        }
        $faculty->updated_at = $hoy;
        $faculty->update();
        return Redirect::to('administracion/facultad');
    }
    public function destroy($id)
    {
       /* $faculty= Articulo::findOrFail($id);
        $faculty->estado='Inactivo';
        $faculty->update();
        return Redirect::to('almacen/articulo');*/
    }
}
