@extends('layouts.admin') @section('contenido')
<div class="breadcrumb">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('gestion/contenido')}}">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{url('gestion/contenido/mis/publicaciones')}}">Publicaciones</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{url('gestion/contenido/mis/publicaciones/ejercicios')}}">Ejercicios</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detalles</li>
        </ol>
    </nav>
</div>
 @include('flash::message')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
        <div class="row titulo">

        <h3 class="detalle">Detalles</h3>
     
        <div class="mystats miEditar">
            <a class="nav-item menu" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons munu">more_vert</i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="{{route('editarEjercicio',['id' => $ejercicio->id])}}"><i class="material-icons">edit</i>Editar</a>
                <a class="dropdown-item" href="#" data-target="#modal-delete-{{$ejercicio->id}}" data-toggle="modal"><i class="material-icons">clear</i>Eliminar</a>
            </div>
        </div>
        </div>
    </div>
</div>
<hr>
<div class="row recuadro">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="row miform">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <label for="">Facultad: </label><p>{{$ejercicio->facultad}}</p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <label for="">Escuela: </label><p>{{$ejercicio->escuela}}</p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <label for="">Catedra: </label><p>{{$ejercicio->catedra}}</p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <label for="">Materia: </label><p>{{$ejercicio->materia}}</p>
            </div>
        </div>
        <div class="row miform">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <label for="">Tema: </label><p>{{$ejercicio->tema}}</p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <label for="">Contenido: </label><p>{{$ejercicio->nombre_contenido}}</p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <label for="">Tipo: </label><p>{{$ejercicio->tipo_nombre}}</p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <label for="">Dificultad: </label><p>{{$ejercicio->dificultad}}</p>
            </div>
        </div>
        <div class="row miform">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <label for="">Usuario Creador: </label><p>{{$ejercicio->usuario_creador}}</p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <label for="">Usuario Modificador : </label><p>{{$ejercicio->usuario_modificador}}</p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <label for="">Fecha de Creación: </label><p>{{$ejercicio->created_at}}</p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <label for="">Fecha de Modificación: </label><p>{{$ejercicio->updated_at}}</p>
            </div>
        </div>

    </div>
</div>
<br>
<div class="container">
    <div class="blog-card">
        <div class="descriptionB">
            <h1>{{$ejercicio->tema}}</h1>
            <h2>{{$ejercicio->nombre_contenido}}</h2>
            <p><?php echo $ejercicio->contenido; ?> </p>
            <form method="post" action="/favorito/ejercicio/{{$ejercicio->id}}">
            @csrf
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <div class="row text-right">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <button class="noFavorito" type="submit" rel="tooltip" title="Agregar a favoritos"><i class="material-icons">favorite_border</i></button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
 @include('gestion.ejercicio.eliminarEjercicioModal')
<br>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
        <div class="row titulo">
            <h3 class="detalle">Soluciones</h3>
        
            <div class="mystats miEditar">
                <a class="nav-item menu" href="{{route('agregarSolucion',['id' => $ejercicio->id])}}" rel="tooltip" title="Agregar">
                    <i class="material-icons munu">add</i>
                </a>
            </div>
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
            <h1>Solución</h1>
            <p><?php echo $sol->contenido; ?> </p>
             <form method="post" action="/favorito/solucion/{{$sol->id}}">
            @csrf
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <div class="row text-right">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
                    <button class="noFavorito" type="submit" rel="tooltip" title="Agregar a favoritos"><i class="material-icons">favorite_border</i></button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
 @include('gestion.ejercicio.modal')
<br>

@endforeach
<script>
$('div.alert').not('.alert-important').delay(3000).fadeOut(350);
</script>
@endsection