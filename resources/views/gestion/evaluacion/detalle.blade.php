@extends('layouts.admin') @section('contenido')
<div class="breadcrumb">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="{{ URL::previous() }}"><i class="material-icons">
            arrow_back</i>Atras</a></li>
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
                <a class="dropdown-item" href="{{route('vistaEvaluacion',['id' => $evaluacion->id])}}"><i class="material-icons">edit</i>Generar</a>
                
                <!--<a class="dropdown-item" href="#" data-target="#modal-delete-{{$evaluacion->id}}" data-toggle="modal"><i class="material-icons">clear</i>Eliminar</a>-->
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
                <label for="">Facultad: </label><p>{{$evaluacion->facultad}}</p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <label for="">Escuela: </label><p>{{$evaluacion->escuela}}</p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <label for="">Catedra: </label><p>{{$evaluacion->catedra}}</p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <label for="">Materia: </label><p>{{$evaluacion->materia}}</p>
            </div>
        </div>
        <div class="row miform">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <label for="">Tema: </label><p>{{$evaluacion->tema}}</p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <label for="">Evaluación: </label><p>{{$evaluacion->nombre_tipo_evaluacion}}</p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <label for="">Tipo: </label><p>{{$evaluacion->nombre_subtipo_evaluacion}}</p>
            </div>
             <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <label for="">Usuario Creador: </label><p>{{$evaluacion->usuario_creador}}</p>
            </div>
        </div>
        <div class="row miform">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <label for="">Fecha de Creación: </label><p>{{$evaluacion->fecha}}</p>
            </div>
        </div>

    </div>
</div>
<br>
<div class="container">
    @foreach($exerciseTemporaryEvaluation as $ejercicio)
    <div class="blog-card">
        <div class="descriptionB">
            <h1>{{$ejercicio->tema}}</h1>
            <h2>{{$ejercicio->nombre_contenido}}</h2>
            <p><?php echo $ejercicio->contenido; ?> </p>
            <div class="row text-right">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <a href="{{route('detallesEjercicio',['id' => $ejercicio->id])}}">
                    <button class="noFavorito" type="submit" rel="tooltip" title="detalles"><i class="-icons">ver más..</i></button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <br>
    @endforeach
</div>

<script>
$('div.alert').not('.alert-important').delay(3000).fadeOut(350);
</script>
@endsection