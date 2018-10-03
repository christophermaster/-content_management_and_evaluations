@extends('layouts.admin')
 @section('contenido')

<div class = "row   ">
    <div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12 text-left">
        <h3> Listado de las Catedras  </h3>
    </div>
    <div class= "col-lg-4 col-md-4 col-sm-4 col-xs-12 text-right">
        <h3> 
            <a href = "{{route('createCatedra',['id' => $id_escuela])}}">
                <button class ="btn btn-success">Nuevo</button>
            </a>
        </h3>
    </div>
</div>
<div class="row">
    <div class= "col-lg-8 col-md-12 col-sm-8 col-xs-12 ">
         @include('administration.university.cathedra.search') 
    </div>
</div>
<div class = "row">
    <div class= "col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
       <div class= "table-responsive">
            <table class= "table table-striped table-bordered table-condensed
            table-hover">
                <thead>

                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Opciones</th>

                </thead>

                @foreach($cathedra as $cat)
                    <tr>
                        <td>{{$cat ->id}}</td>
                        <td>{{$cat ->nombre}}</td>
                        <td>{{$cat ->descripcion}}</td>
                        <td>
                           <a href = "{{route('updateCatedra',['id' => $cat->id])}}">
                                <button class= "btn btn-info">Editar</button>
                            </a>
                            <a href = ""  data-toggle="modal">
                                <button class= "btn btn-danger">Eliminar</button>
                            </a>
                          <!--<a href="{{route('catedra',['id' => $cat->id])}}">
                                <button class= "btn btn-primary">Detalles</button>
                            </a>-->
                        </td>

                    </tr>
                    @include('administration.university.cathedra.modal')
                @endforeach


            </table>
       </div>
       {{$cathedra ->render()}}
    </div>
</div> 

@endsection

