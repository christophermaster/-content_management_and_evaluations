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
        $user = Auth::user()->id_cargo;

         if($user == 1){

            if ($request)
            {
                $query=trim($request->get('searchText'));
                $faculty=DB::table('faculties as f')
                //->join('categoria as c','a.idcategoria','=',"c.idcategoria")
                ->select('f.id','f.nombre','f.descripcion')
                ->where('f.nombre','LIKE','%'.$query.'%')
                //->orwhere('a.codigo','LIKE','%'.$query.'%')
                ->orderBy('f.id','asc')
                ->paginate(3);

                return view('administration.university.faculty.index',["faculty"=>$faculty,"searchText"=>$query,"user"=> $user]);
            }

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
        $faculty->nombre=$request->get('nombre');
        $faculty->descripcion=$request->get('descripcion');

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
        $faculty=new Faculty;
        $faculty->nombre=$request->get('nombre');
        $faculty->descripcion=$request->get('descripcion');

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
