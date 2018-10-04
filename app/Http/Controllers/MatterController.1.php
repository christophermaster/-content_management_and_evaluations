<?php

namespace gestion\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use gestion\Http\Requests\MatterFormRequest;
use gestion\models\Cathedra;
use gestion\models\Matter;
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
            $matter=DB::table('matters as m')
            //->join('categoria as c','a.idcategoria','=',"c.idcategoria")
            ->select('m.id','m.nombre','m.descripcion')
            ->where('m.nombre','LIKE','%'.$query.'%')
            ->where('m.id_catedra',"=",$id)
            //->orwhere('a.codigo','LIKE','%'.$query.'%')
            ->orderBy('m.id','asc')
            ->paginate(3);

            return view('administration.university.matter.index',["matter"=>$matter,"id_catedra"=>$id,"searchText"=>$query]);
        }
        
          
    }
    public function create($id)
    {
        /*$categorias = DB::table('categoria')->where('condicion','=','1')->get();*/
        return view("administration.university.matter.create",["id_catedra"=>$id]);
    }
    public function store (MatterFormRequest $request)
    {
        $matter=new Matter;
        $matter->nombre=$request->get('nombre');
        $matter->descripcion=$request->get('descripcion');
        $matter->id_catedra=$request->get('id_catedra');

        $matter->save();
       
         return Redirect::to('facultad/materia/'.$request->get('id_catedra'));

    }
    public function show($id)
    {
       /* return view("almacen.articulo.show",["articulo"=>Articulo::findOrFail($id)]);*/
    }
    public function edit($id)
    {
        $matter = Matter::findOrfail($id);
        return view("administration.university.matter.edit",["matter"=>$matter]);
    }
    public function update(MatterFormRequest $request, $id)
    {
        $matter = Matter::findOrfail($id);
        $matter->nombre=$request->get('nombre');
        $matter->descripcion=$request->get('descripcion');
        $matter->id_catedra=$request->get('id_catedra');
        $matter->update();
        return Redirect::to('facultad/materia/'.$request->get('id_catedra'));
    }
    public function destroy($id)
    {
       /* $faculty= Articulo::findOrFail($id);
        $faculty->estado='Inactivo';
        $faculty->update();
        return Redirect::to('almacen/articulo');*/
    }
}
