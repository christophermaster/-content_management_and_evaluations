@extends('layouts.admin') @section('contenido')
<div class="breadcrumb">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="{{ URL::previous() }}"><i class="material-icons">
            arrow_back</i>Atras</a></li>
        </ol>
    </nav>
</div>

<!--FILTRAR LOS EJERCICIOS-->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div id="accordion" role="tablist">
                    <div class="card-collapse">
                        <!--
                            ENCABEZADO
                        -->
                        <div class="card-header" role="tab" id="headingTwo">
                            <h5 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Filtrar
                                    <i class="material-icons">import_export</i>
                                </a>
                            </h5>
                        </div>
                        <!--
                            BODY
                        -->
                        <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                        @include('gestion.solucion.search')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
        <div class="row titulo">
            <h3 class="detalle">Soluciones</h3>
        </div>
    </div>
</div>
@foreach($solucion as $sol)
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
        <div class="row titulo">

        <h3 class="detalle"></h3>
     
        <div class="mystats miEditar">
            <a class="nav-item menu" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons munu">more_vert</i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="{{route('solutionEditar',['id' => $sol->id])}}"><i class="material-icons">edit</i>Editar</a>
                <a class="dropdown-item" href="#" data-target="#modal-delete-{{$sol->id}}" data-toggle="modal"><i class="material-icons">clear</i>Eliminar</a>
                <a class="dropdown-item" href="{{route('detallesEjercicio',['id' => $sol->id_ejercicio])}}" ><i class="material-icons">description</i>Detalles</a>
            </div>
        </div>
        </div>
    </div>
</div>
<br>
<hr>

<div class="row recuadro">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="row miform">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <label for="">Usuario Creador: </label><p>{{$sol->usuario_creador}}</p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <label for="">Usuario Modificador : </label><p>{{$sol->usuario_modificador}}</p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <label for="">Fecha de Creación: </label><p>{{$sol->created_at}}</p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <label for="">Fecha de Modificación: </label><p>{{$sol->updated_at}}</p>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="blog-card">
        <div class="descriptionB">
            <form method="post" action="/favorito/ejercicio/{{$sol->id}}">
            @csrf
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <div class="row text-right">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <button class="noFavorito" type="submit" rel="tooltip" title="Agregar a favoritos"><i class="material-icons">favorite_border</i></button>
            </div>
            </div>
            </form>
            <h1>Solución</h1>
            <hr>
            <p><?php echo $sol->contenido; ?> </p>
        </div>
    </div>
</div>
 @include('gestion.solucion.modal')
<br>

@endforeach
@endsection