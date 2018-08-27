<?php

namespace gestion\Http\Controllers;

use Illuminate\Http\Request;
use gestion\Http\Requests;
use gestion\Contenido;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Auth\Middleware\Authenticate;
use gestion\Http\Requests\ContenidoFormRequest;
use DB;

class ContenidoController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $contenido=DB::table('contenido')->where('contenido','LIKE','%'.$query.'%')
           // ->where ('condicion','=','1')
            ->orderBy('id','desc')
            ->paginate(7);
            return view('gestion.index',["contenido"=>$contenido,"searchText"=>$query]);
        }
    }

    public function create()
    {
        return view("gestion.create");
    }

    public function store (ContenidoFormRequest $request)
    {
        $contenido= new Contenido;
        $contenido->contenido=$request->get('contenido');
        $contenido->id_user='2';
        $contenido->save();
        return Redirect::to('gestion');

    }
    public function show($id)
    {
        return view("gestion.show",["contenido"=>Contenido::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("gestion.edit",["contenido"=>Contenido::findOrFail($id)]);
    }
    public function update(ContenidoFormRequest $request,$id)
    {
        $contenido=new Contenido;
        $contenido->contenido=$request->get('contenido');
        $categoria->id_user='2';
        $categoria->update();
        return Redirect::to('gestion/contenido');
    }
    public function destroy($id)
    {
        $categoria=Categoria::findOrFail($id);
        $categoria->condicion='0';
        $categoria->update();
        return Redirect::to('gestion/contenido');
    }
}
