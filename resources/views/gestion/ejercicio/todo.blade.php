@extends('layouts.admin') @section('contenido')
<div class="breadcrumb">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="{{ URL::previous() }}"><i class="material-icons">
            arrow_back</i>Atras</a></li>
        </ol>
    </nav>
</div>

<ul class="nav nav-tabs nav-tab" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link a active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
            aria-selected="true"><i class="material-icons">
                category
            </i>Ejercicios</a>
    </li>
    <li class="nav-item">
        <a class="nav-link a" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
            aria-selected="false"><i class="material-icons">
                extension
            </i>Soluciones</a>
    </li>

</ul>

<div class="tab-content">
    <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                <div class="row titulo">
                    <h3 class="detalle">Repositorio de Ejercicios</h3>

                    <div class="mystats miEditar">
                        <a class="nav-item menu" href="{{url('gestion/ejercicio/create')}}" rel="tooltip" title="Agregar">
                            <i class="material-icons munu">add</i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="container">
            <!--
    FILTRAR LOS EJERCICIOS 
-->
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
                                            <a class="collapsed" data-toggle="collapse" href="#collapseTwo"
                                                aria-expanded="false" aria-controls="collapseTwo">
                                                Filtrar
                                                <i class="material-icons">import_export</i>
                                            </a>
                                        </h5>
                                    </div>
                                    <!--
                            BODY
                        -->
                                    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                                    @include('gestion.ejercicio.search')
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
            @foreach($ejercicio as $ejer)
            <div class="blog-card bCard">
                <div class="meta">
                    @if($ejer->id_tema == 1)
                    <div class="photoo" style="background-image: url('{{asset('img/logica.jpg')}}')"></div>
                    @elseif($ejer->id_tema == 2)
                    <div class="photoo" style="background-image: url('{{asset('img/conjunto.png')}}')"></div>
                    @elseif($ejer->id_tema == 3)
                    <div class="photoo" style="background-image: url('{{asset('img/relaciones.jpg')}}')"></div>
                    @else
                    <div class="photoo" style="background-image: url('{{asset('img/conteo.jpg')}}')"></div>
                    @endif

                    <ul class="details">
                        <li class="author"><a href="#">{{$ejer->usuario_creador}}</a></li>
                        <li class="date">{{$ejer->created_at}}</li>
                        <li class="tags">
                            <ul>
                                <li><a href="#">{{$ejer->facultad}}</a></li>
                                <li><a href="#">{{$ejer->escuela}}</a></li>
                                <li><a href="#">{{$ejer->catedra}}</a></li>
                                <li><a href="#">{{$ejer->materia}}</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="description des">
                    <p class="read-more">
                        <a href="{{route('detallesEjercicio',['id' => $ejer->id])}}">Ver más</a>
                    </p>
                    <h1>{{$ejer->tema}}</h1>
                    <h2>{{$ejer->nombre_contenido}}</h2>
                    <p>
                        <?php echo $ejer->contenido; ?>
                    </p>

                </div>
            </div>
            @endforeach
            <div class="text-center">
                {{$ejercicio ->render()}}
            </div>
        </div>
    </div>

    <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
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
        <div class="description">
            <h1>Solución</h1>
            <p><?php echo $sol->contenido; ?> </p>
        </div>
    </div>
</div>
 @include('gestion.solucion.modal')
<br>

@endforeach
    </div>
</div>

@endsection