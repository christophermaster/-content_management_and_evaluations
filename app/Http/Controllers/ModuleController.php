<?php

namespace gestion\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use gestion\Http\Requests\ModuleFormRequest;
use gestion\models\Matter;
use gestion\models\Module;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use DB;

class ModuleController extends Controller
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
            $module=DB::table('modules as m')
            //->join('categoria as c','a.idcategoria','=',"c.idcategoria")
            ->select('m.id','m.nombre','m.descripcion','m.usuario_creador'
            ,'m.usuario_modificador','m.created_at','m.updated_at')
            ->where('m.nombre','LIKE','%'.$query.'%')
            ->where('m.id_materia',"=",$id)
            //->orwhere('a.codigo','LIKE','%'.$query.'%')
            ->orderBy('m.id','desc')
            ->paginate(10);

            return view('administration.university.module.index',["module"=>$module,"id_materia"=>$id,"searchText"=>$query]);
        }
        
          
    }
    public function create($id)
    {
        /*$categorias = DB::table('categoria')->where('condicion','=','1')->get();*/
        return view("administration.university.module.create",["id_materia"=>$id]);
    }
    public function store (ModuleFormRequest $request)
    {
        $module=new Module;
        $usuario = Auth::user()->name;
        $hoy = date("Y-m-d H:i:s");  
        $module->nombre = $request->get('nombre');
        $module->descripcion = $request->get('descripcion');
        $module->id_materia = $request->get('id_materia');
        if(Auth::check()){
            $module->usuario_creador=$usuario;
            $module->usuario_modificador= $usuario;
        }
        $module->created_at = $hoy;
        $module->updated_at = $hoy;
        $module->save();
       
         return Redirect::to('facultad/modulo/'.$request->get('id_materia'));

    }
    public function show($id)
    {
       /* return view("almacen.articulo.show",["articulo"=>Articulo::findOrFail($id)]);*/
    }
    public function edit($id)
    {
        $module = Module::findOrfail($id);
        return view("administration.university.module.edit",["module"=>$module]);
    }
    public function update(ModuleFormRequest $request, $id)
    {
        $module = Module::findOrfail($id);
        $usuario = Auth::user()->name;
        $hoy = date("Y-m-d H:i:s");  
        $module->nombre=$request->get('nombre');
        $module->descripcion=$request->get('descripcion');
        $module->id_materia=$request->get('id_materia');
        if(Auth::check()){
            $module->usuario_modificador= $usuario;
        }
        $module->updated_at = $hoy;
        $module->update();
        return Redirect::to('facultad/modulo/'.$request->get('id_materia'));
    }
    public function destroy($id)
    {
       /* $faculty= Articulo::findOrFail($id);
        $faculty->estado='Inactivo';
        $faculty->update();
        return Redirect::to('almacen/articulo');*/
    }
}
