<?php

namespace gestion\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use gestion\Http\Requests\UserResquest;
use gestion\models\Faculty;
use gestion\models\People;
use gestion\models\Teacher;
use gestion\User;
use gestion\models\School;
use gestion\models\Cathedra;
use gestion\models\Matter;
use Illuminate\Support\Facades\Hash;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use DB;

class MiPerfilController extends Controller
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
            $usuario = Auth::user()->name;
            $user=DB::table('faculties as fac')
            ->join('schools as sch','fac.id','=',"sch.id_facultad")
            ->join('cathedras as cat','sch.id','=',"cat.id_escuela")
            ->join('matters as mat','cat.id','=',"mat.id_catedra")
            ->join('teachers as tea','mat.id','=',"tea.id_materia")
            ->join('peoples as peo','tea.id_persona','=',"peo.id")
            ->join('users as use','use.id_persona','=',"peo.id")
            ->join('roles as rol','rol.id','=',"use.id_cargo")
            ->select('peo.id as id','fac.nombre as facultad','sch.nombre as escuela'
            ,'mat.nombre as materia','cat.nombre as catedra','rol.nombre as cargo','peo.nombre','peo.apellido',
            'peo.cedula','peo.descripcion','use.name','use.email')
            ->where('use.name','=',$usuario)->get();

            return view('perfil.index',["user"=>$user]);
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
        $faculty=DB::table('faculties as f')
        ->select('f.id','f.nombre')
        ->get();
        $roles=DB::table('roles as r')
        ->select('r.id','r.nombre')
        ->get();
        return view("administration.user.create",["faculty"=>$faculty,"cargo"=>$roles]);
    }
    public function store(AdminUserResquest $request)
    {
       
    }
    public function show($id)
    {
      
    }
    public function edit($id)
    {
        $people = People::findOrfail($id);
        $user = DB::table('users as use')
        ->where("use.id_persona","=",$people->id)
        ->get()->first();
        $faculty=DB::table('faculties as f')
        ->select('f.id','f.nombre')
        ->get();

        return view("perfil.edit",["people"=>$people,"user"=> $user,"faculty"=> $faculty]);
    }
    public function update(UserResquest $request, $id)
    {
        $usuario = Auth::user()->name;
        $hoy = date("Y-m-d H:i:s");  
        $people = People::findOrfail($id);
        $people->nombre = $request->get('nombre');
        $people->apellido = $request->get('apellido');
        $people->cedula = $request->get('cedula');
        $people->descripcion = $request->get('descripcion');
        if(Auth::check()){
            $people->usuario_modificador= $usuario;
        }
        $people->updated_at = $hoy;
        $people->update();

        $user = User::findOrfail($request->get('id_user'));
        $user->email = $request->get('email');
        if($request->get('password')){
            $user->password =Hash::make($request->get('password'));
        }
        if(Auth::check()){
            $user->usuario_modificador= $usuario;
        }
        $user->updated_at = $hoy;
        $user->update();


/*
        $teacher=new Teacher;
        $teacher->id_materia =$request->get('id_materia');
        $teacher->id_materia =$people->id;
        if(Auth::check()){
            $teacher->usuario_creador=$usuario;
            $teacher->usuario_modificador= $usuario;
        }
        $teacher->created_at = $hoy;
        $teacher->updated_at = $hoy;

        $user = User::create([
        'name' =>$request->get('name'),
        'email' =>$request->get('email'),
        'password' => Hash::make($request->get('password')),
        'id_persona' =>$people->id,
        'id_cargo' => $request->get('id_cargo'),
        'usuario_creador' =>$usuario,
        'usuario_modificador' =>$usuario,
            ]);   */
        return Redirect::to('mi/perfil');
    }
     public function updateB(FacultyFormRequest $request, $id)
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
