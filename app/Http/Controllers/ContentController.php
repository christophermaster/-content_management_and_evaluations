<?php

namespace gestion\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use gestion\Http\Requests\ContentFormRequest;
use gestion\models\Topic;
use gestion\models\Content;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use DB;


class ContentController extends Controller
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
            $content=DB::table('contents as c')
            //->join('categoria as c','a.idcategoria','=',"c.idcategoria")
            ->select('c.id','c.nombre','c.descripcion','c.usuario_creador'
            ,'c.usuario_modificador','c.created_at','c.updated_at')
            ->where('c.nombre','LIKE','%'.$query.'%')
            ->where('c.id_tema',"=",$id)
            //->orwhere('a.codigo','LIKE','%'.$query.'%')
            ->orderBy('c.id','asc')
            ->paginate(10);

            return view('administration.university.content.index',["content"=>$content,"id_tema"=>$id,"searchText"=>$query]);
        }
        
          
    }
    public function create($id)
    {
        /*$categorias = DB::table('categoria')->where('condicion','=','1')->get();*/
        return view("administration.university.content.create",["id_tema"=>$id]);
    }
    public function store (ContentFormRequest $request)
    {
        $content=new Content;
        $usuario = Auth::user()->name;
        $hoy = date("Y-m-d H:i:s");  
        $content->nombre = $request->get('nombre');
        $content->descripcion = $request->get('descripcion');
        $content->id_tema = $request->get('id_tema');
        if(Auth::check()){
            $content->usuario_creador=$usuario;
            $content->usuario_modificador= $usuario;
        }
        $content->created_at = $hoy;
        $content->updated_at = $hoy;
        $content->save();
       
         return Redirect::to('facultad/contenido/'.$request->get('id_tema'));

    }
    public function show($id)
    {
       /* return view("almacen.articulo.show",["articulo"=>Articulo::findOrFail($id)]);*/
    }
    public function edit($id)
    {
        $content = Content::findOrfail($id);
        return view("administration.university.content.edit",["content"=>$content]);
    }
    public function update(ContentFormRequest $request, $id)
    {
        $content = Content::findOrfail($id);
        $usuario = Auth::user()->name;
        $hoy = date("Y-m-d H:i:s");  
        $content->nombre=$request->get('nombre');
        $content->descripcion=$request->get('descripcion');
        $content->id_tema=$request->get('id_tema');
        if(Auth::check()){
            $content->usuario_modificador= $usuario;
        }
        $content->updated_at = $hoy;
        $content->update();
        return Redirect::to('facultad/contenido/'.$request->get('id_tema'));
    }
    public function destroy($id)
    {
       /* $faculty= Articulo::findOrFail($id);
        $faculty->estado='Inactivo';
        $faculty->update();
        return Redirect::to('almacen/articulo');*/
    }
}
