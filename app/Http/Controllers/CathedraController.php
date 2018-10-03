<?php

namespace gestion\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use gestion\Http\Requests\CathedraFormRequest;
use gestion\models\School;
use gestion\models\Cathedra;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use DB;

class CathedraController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request,$id)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $cathedra=DB::table('cathedras as c')
            //->join('categoria as c','a.idcategoria','=',"c.idcategoria")
            ->select('c.id','c.nombre','c.descripcion')
            ->where('c.nombre','LIKE','%'.$query.'%')
            ->where('c.id_escuela',"=",$id)
            //->orwhere('a.codigo','LIKE','%'.$query.'%')
            ->orderBy('c.id','asc')
            ->paginate(3);

            return view('administration.university.cathedra.index',["cathedra"=>$cathedra,"id_escuela"=>$id,"searchText"=>$query]);
        }
        
          
    }
    public function create($id)
    {
        /*$categorias = DB::table('categoria')->where('condicion','=','1')->get();*/
        return view("administration.university.cathedra.create",["id_escuela"=>$id]);
    }
    public function store (CathedraFormRequest $request)
    {
        $cathedra=new Cathedra;
        $cathedra->nombre=$request->get('nombre');
        $cathedra->descripcion=$request->get('descripcion');
        $cathedra->id_escuela=$request->get('id_escuela');

        $cathedra->save();
       
         return Redirect::to('facultad/catedra/'.$request->get('id_escuela'));

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
        $school->nombre=$request->get('nombre');
        $school->descripcion=$request->get('descripcion');
        $school->id_facultad=$request->get('id_facultad');
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
