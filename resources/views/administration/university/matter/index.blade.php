@extends('layouts.admin')
 @section('contenido')

<div class = "row recuadro">
    <div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12 text-left">
        <h3> Listado de Materias</h3>
    </div>
    <div class= "col-lg-4 col-md-4 col-sm-4 col-xs-12 text-right">
        <h3> 
          @include('administration.university.matter.search')
        </h3>
    </div>
</div>

<div class = "row">
    <div class= "col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
         <div class="card">
            <div class="card-header">
                <div class= "col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
                    <h3> 
                        <a href = "{{route('createMateria',['id' => $id_catedra])}}">
                            <button class ="btn btn-success">Nuevo</button>
                        </a>
                    </h3>
                </div>          
            </div>
             <div class="card-body">
                <div class= "table-responsive">
                        <table class= "table table-striped table-bordered table-hover text-center">
                            <thead>

                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Usuario Creador</th>
                                <th>Usuario Modificador</th>
                                <th>Fecha de Creación</th>
                                <th>Fecha de Modificación</th>
                                <th>Opciones</th>

                            </thead>

                            @foreach($matter as $mat)
                                <tr>
                                    <td>{{$mat ->id}}</td>
                                    <td>{{$mat ->nombre}}</td>
                                    <td>{{$mat ->descripcion}}</td>
                                    <td>{{$mat ->usuario_creador}}</td>
                                    <td>{{$mat ->usuario_modificador}}</td>
                                    <td>{{$mat ->created_at}}</td>
                                    <td>{{$mat ->updated_at}}</td>
                                    <td class="td-actions">
                                        <a href="{{route('modulo',['id' => $mat->id])}}">
                                            <button type="button" rel="tooltip" class="btn btn-info btn-link" data-original-title="Ver Catedras" title="Ver modulos">
                                                <i class="material-icons">visibility</i>
                                            </button>
                                        </a>
                                        <a href="{{route('updateMateria',['id' => $mat->id])}}">
                                            <button type="button" rel="tooltip" class="btn btn-success btn-link" data-original-title="Editar" title="Editar">
                                                <i class="material-icons">edit</i>
                                            </button>
                                        </a>
                                        <a href="" data-toggle="modal">
                                            <button type="button" rel="tooltip" class="btn btn-danger btn-link" data-original-title="Eliminar" title="Eliminar">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                @include('administration.university.matter.modal')
                            @endforeach


                        </table>
                </div>
             </div>
             <div class="text-center">
                {{$matter ->render()}}
             </div>
         </div>
      
    </div>
</div> 

@endsection

