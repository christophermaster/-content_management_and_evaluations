<?php

namespace gestion\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use gestion\Http\Requests\FacultyFormRequest;
use gestion\models\Faculty;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use DB;

class FacultyController extends Controller
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
            $query=trim($request->get('searchText'));
            $faculty=DB::table('faculties as f')
            //->join('categoria as c','a.idcategoria','=',"c.idcategoria")
            ->select('f.id','f.nombre','f.descripcion','f.usuario_creador'
            ,'f.usuario_modificador','f.created_at','f.updated_at')
            ->where('f.nombre','LIKE','%'.$query.'%')
            //->orwhere('a.codigo','LIKE','%'.$query.'%')
            ->orderBy('f.id','desc')
            ->paginate(10);

            return view('administration.university.faculty.index',["faculty"=>$faculty,"searchText"=>$query]);
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
