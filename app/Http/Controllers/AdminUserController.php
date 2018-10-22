<?php

namespace gestion\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use gestion\Http\Requests\AdminUserResquest;
use gestion\models\Faculty;
use gestion\models\People;
use gestion\models\Teacher;
use gestion\User;
use gestion\models\School;
use gestion\models\Cathedra;
use gestion\models\Matter;
use gestion\models\Topic;
use gestion\models\Content;
use Illuminate\Support\Facades\Hash;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use DB;

class AdminUserController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    
    }

    public function index(Request $request)
    {
        if ($request)
        {

            $query=trim($request->get('searchText'));
            $user=DB::table('faculties as fac')
            ->join('schools as sch','fac.id','=',"sch.id_facultad")
            ->join('cathedras as cat','sch.id','=',"cat.id_escuela")
            ->join('matters as mat','cat.id','=',"mat.id_catedra")
            ->join('teachers as tea','mat.id','=',"tea.id_materia")
            ->join('peoples as peo','tea.id_persona','=',"peo.id")
            ->join('users as use','use.id_persona','=',"peo.id")
            ->join('roles as rol','rol.id','=',"use.id_cargo")
            ->select('peo.id','fac.nombre as facultad','sch.nombre as escuela'
            ,'mat.nombre as materia','rol.nombre as cargo','peo.nombre','peo.apellido',
            'peo.cedula','use.name','use.email')
            ->where('peo.nombre','LIKE','%'.$query.'%')
            //->orwhere('a.codigo','LIKE','%'.$query.'%')
            ->orderBy('peo.id','asc')
            ->paginate(10);

            return view('administration.user.index',["user"=>$user,"searchText"=>$query]);
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

    public function getTopic(Request $request, $id){
        if($request->ajax()){
            $topic = Topic::topics($id);
            return response()->json($topic);
        }
    }
    public function getContent(Request $request, $id){
        if($request->ajax()){
            $content = Content::contents($id);
            return response()->json($content);
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
    public function store (AdminUserResquest $request)
    {
        $usuario = Auth::user()->name;
        $hoy = date("Y-m-d H:i:s");  
         try {
            DB::beginTransaction();
            $people = new People;
            $people->nombre = $request->get('nombre');
            $people->apellido = $request->get('apellido');
            $people->cedula = $request->get('cedula');
            if(Auth::check()){
                $people->usuario_creador=$usuario;
                $people->usuario_modificador= $usuario;
            }
            $people->created_at = $hoy;
            $people->updated_at = $hoy;
            $people->save();


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
             ]);   
            DB::commit();
        } catch (Exception $e) 
        {
            DB::rollback();
        }
        return Redirect::to('facultad/profe');
    }
    public function show($id)
    {
       /* return view("almacen.articulo.show",["articulo"=>Articulo::findOrFail($id)]);*/
    }
    public function edit($id)
    {
        $faculty = Faculty::findOrfail($id);
        return view("administration.user.edit",["faculty"=>$faculty]);
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
