@extends('layouts.admin') 
@section('contenido')
<div class="breadcrumb">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('gestion/contenido')}}">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
        </ol>
    </nav>
</div>
<div class="row ">
     <div class= "col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center ">
      <h1>  <img src="{{asset('img/logo-uc.png')}}" width="100" height="150" > UC - Universidad De Carabobo</h1>
     </div>
     
 </div>
 <hr>
<div class = "row recuadro">
    <div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12 text-left">
        <h3> Listado de Profesores y Preparadores </h3>
    </div>
    <div class= "col-lg-4 col-md-4 col-sm-4 col-xs-12 text-right">
        @include('administration.user.search')
    </div>
</div>

<div class = "row">
    <div class= "col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
        <div class="card">
            <div class="card-header">
                <div class= "col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
                    <a href = "/facultad/profe/create">
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
                            <th>Apellido</th>
                            <th>Cedula</th>
                            <th>Usuario</th>
                            <th>Correo</th>
                            <th>Cargo</th>
                            <th>Materia</th>
                            <th>Escuela</th>
                            <th>Facultad</th>
                            <th>Opciones</th>

                        </thead>
                        @foreach($user as $us)
                            <tr>
                                <td>{{$us ->id}}</td>
                                <td>{{$us ->nombre}}</td>
                                <td>{{$us ->apellido}}</td>
                                <td>{{$us ->cedula}}</td>
                                <td>{{$us ->name}}</td>
                                <td>{{$us ->email}}</td>
                                <td>{{$us ->cargo}}</td>
                                <td>{{$us ->materia}}</td>
                                <td>{{$us ->escuela}}</td>
                                <td>{{$us ->facultad}}</td>
                                <td class="td-actions">
                                    <a href="">
                                        <button type="button" rel="tooltip" class="btn btn-info btn-link" data-original-title="Ver Carreras" title="Ver escuelas">
                                        <i class="material-icons">visibility</i>
                                        </button>
                                    </a>
                                    <a href ="">
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
                            @include('administration.user.modal')
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="text-center">
                {{$user ->render()}}
            </div>
            
        </div>  
    </div>
</div>

@endsection