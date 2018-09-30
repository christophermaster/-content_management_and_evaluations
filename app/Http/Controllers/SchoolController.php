<?php

namespace gestion\Http\Controllers;
use Illuminate\Support\Facades\Input;
use gestion\models\Faculty;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
     public function __construct()
    {
        //$this->middleware('auth');
    }
    public function index(Request $request,$id)
    {
        $user= $id;
        return view('administration.university.school.index',["user"=>$user]);
          
    }
    public function create()
    {
        /*$categorias = DB::table('categoria')->where('condicion','=','1')->get();
        return view("administration.university.faculty.create");*/
    }
    public function store (FacultyFormRequest $request)
    {
        /*$faculty=new Faculty;
        $faculty->nombre=$request->get('nombre');
        $faculty->descripcion=$request->get('descripcion');

        $faculty->save();
        return Redirect::to('administracion/facultad');*/

    }
    public function show($id)
    {
       /* return view("almacen.articulo.show",["articulo"=>Articulo::findOrFail($id)]);*/
    }
    public function edit($id)
    {
       /* $faculty = Faculty::findOrfail($id);
        return view("administration.university.faculty.edit",["faculty"=>$faculty]);*/
    }
    public function update(FacultyFormRequest $request, $id)
    {
        /*$faculty=new Faculty;
        $faculty->nombre=$request->get('nombre');
        $faculty->descripcion=$request->get('descripcion');

        $faculty->update();
        return Redirect::to('administracion/facultad');*/
    }
    public function destroy($id)
    {
       /* $faculty= Articulo::findOrFail($id);
        $faculty->estado='Inactivo';
        $faculty->update();
        return Redirect::to('almacen/articulo');*/
    }
}
