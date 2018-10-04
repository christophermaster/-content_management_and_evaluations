@extends('layouts.admin')
 @section('contenido')

 <div class="row ">
     <div class= "col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center ">
      <h1>  <img src="{{asset('img/logo-uc.png')}}" width="100" height="150" > UC - Universidad De Carabobo</h1>
     </div>
     
 </div>
 <hr>
<div class = "row   ">
    <div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12 text-left">
        <h3> Listado de Facultades</h3>
    </div>
    <div class= "col-lg-4 col-md-4 col-sm-4 col-xs-12 text-right">
        @include('administration.university.faculty.search')
    </div>
</div>

<div class = "row">
    <div class= "col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
        <div class="card">
            <div class="card-header">
                <div class= "col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
                    <a href = "facultad/create/">
                    <button class ="btn btn-success">Nuevo</button>
                    </a>
                </div>
            </div>

            <div class="card-body">
                <div class= "table-responsive">
                    <table class= "table table-striped table-bordered table-hover text-center">
                        <thead>

                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Opciones</th>

                        </thead>

                        @foreach($faculty as $fac)
                            <tr>
                                <td>{{$fac ->id}}</td>
                                <td>{{$fac ->nombre}}</td>
                                <td>{{$fac ->descripcion}}</td>

                                <td class="td-actions">
                                    <a href="{{route('escuela',['id' => $fac->id])}}">
                                        <button type="button" rel="tooltip" class="btn btn-info btn-link" data-original-title="Ver Carreras" title="Ver Carreras">
                                        <i class="material-icons">visibility</i>
                                        </button>
                                    </a>
                                    <a href ="{{URL::action('FacultyController@edit', $fac->id)}}">
                                        <button type="button" rel="tooltip" class="btn btn-success btn-link" data-original-title="Editar" title="Editar">
                                        <i class="material-icons">edit</i>
                                        </button>
                                    </a>
                                    <a href = ""  data-toggle="modal">
                                        <button type="button" rel="tooltip" class="btn btn-danger btn-link" data-original-title="Eliminar" title="Eliminar">
                                        <i class="material-icons">close</i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            @include('administration.university.faculty.modal')
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="text-center">
                {{$faculty ->render()}}
            </div>
            
        </div>
      
       
    </div>
</div>

@endsection

