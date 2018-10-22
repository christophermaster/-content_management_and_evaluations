<?php

namespace gestion\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use gestion\Http\Requests\SchoolFormRequest;
use gestion\models\Faculty;
use gestion\models\School;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use DB;

class SchoolController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    public function index(Request $request,$id)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $school=DB::table('schools as s')
            //->join('categoria as c','a.idcategoria','=',"c.idcategoria")
            ->select('s.id','s.nombre','s.descripcion','s.usuario_creador'
            ,'s.usuario_modificador','s.created_at','s.updated_at')
            ->where('s.nombre','LIKE','%'.$query.'%')
            ->where('s.id_facultad',"=",$id)
            //->orwhere('a.codigo','LIKE','%'.$query.'%')
            ->orderBy('s.id','asc')
            ->paginate(10);

            return view('administration.university.school.index',["school"=>$school,"id_facultad"=>$id,"searchText"=>$query]);
        }
        
          
    }
    public function create($id)
    {
        /*$categorias = DB::table('categoria')->where('condicion','=','1')->get();*/
        return view("administration.university.school.create",["id_facultad"=>$id]);
    }
    public function store (SchoolFormRequest $request)
    {
        $school=new School;
        $usuario = Auth::user()->name;
        $hoy = date("Y-m-d H:i:s"); 
        $school->nombre=$request->get('nombre');
        $school->descripcion=$request->get('descripcion');
        $school->id_facultad=$request->get('id_facultad');
        if(Auth::check()){
            $school->usuario_creador=$usuario;
            $school->usuario_modificador= $usuario;
        }
        $school->created_at = $hoy;
        $school->updated_at = $hoy;

        $school->save();
       
         return Redirect::to('facultad/escuela/'.$request->get('id_facultad'));

    }
    public function show($id)
    {
       /* return view("almacen.articulo.show",["articulo"=>Articulo::findOrFail($id)]);*/
    }
    public function edit($id)
    {
        $school = School::findOrfail($id);
        return view("administration.university.school.edit",["school"=>$school]);
    }
    public function update(SchoolFormRequest $request, $id)
    {
        $school = School::findOrfail($id);
        $usuario = Auth::user()->name;
        $hoy = date("Y-m-d H:i:s"); 
        $school->nombre=$request->get('nombre');
        $school->descripcion=$request->get('descripcion');
        $school->id_facultad=$request->get('id_facultad');
        if(Auth::check()){
            $school->usuario_modificador= $usuario;
        }
        $school->updated_at = $hoy;
        $school->update();
        return Redirect::to('facultad/escuela/'.$request->get('id_facultad'));
    }
    public function destroy($id)
    {
       /* $faculty= Articulo::findOrFail($id);
        $faculty->estado='Inactivo';
        $faculty->update();
        return Redirect::to('almacen/articulo');*/
    }
}
