@extends('layouts.admin') @section('contenido')
<div class="breadcrumb">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="{{ URL::previous() }}"><i class="material-icons">
            arrow_back</i>Atras</a></li>
        </ol>
    </nav>
</div>
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
<!--
    PANEL QUE MUESTRA LA CANTIDAD DE EJERCICIOS Y SOLUCIONES  SUBIDOS  
-->
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">description</i>
                </div>
                <p class="card-category">Ejercicios</p>
                <h3 class="card-title">{{$cantEjercicio->cantidad}}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">description</i>Ejercicios subidos
                </div>
                <div >
                    <a  href="{{route('soloEjercicio')}}">
                        <i class="material-icons">arrow_right_alt</i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">extension</i>
                </div>
                <p class="card-category">Soluciones</p>
                <h3 class="card-title">{{$cantSoluciones->cantidad}}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">extension</i>Soluciones subidas
                </div>
                <div >
                    <a  href="{{route('misSoluciones')}}">
                        <i class="material-icons">arrow_right_alt</i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="card card-stats">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">favorite</i>
                </div>
                <p class="card-category">favorito</p>
                <h3 class="card-title">{{$cantfavorites->cantidad}}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">favorite</i> Ejer. o Sol. favoritas
                </div>
                <div >
                    <a  href="{{url('gestion/contenido/mis/favoritos')}}">
                        <i class="material-icons">arrow_right_alt</i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">cloud_upload</i>
                </div>
                <p class="card-category">Archivos</p>
                <h3 class="card-title">{{$cantUpdate->cantidad}}</h3>
            </div>

            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">cloud_upload</i>Materiales Subidos
                </div>
                <div >
                    <a  href="{{url('gestion/contenido/mis/materiales/digitalizados')}}">
                        <i class="material-icons">arrow_right_alt</i>
                    </a>
                </div>
            </div>

        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-inf card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">assignment</i>
                </div>
                <p class="card-category">Evaluaciones</p>
                <h3 class="card-title">{{$canttemporaryevaluations->cantidad}}</h3>
            </div>

            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">assignment</i>Evaluaciones Realizadas
                </div>
                <div >
                    <a  href="{{url('gestion/contenido/mis/pulicaciones/mis/evaluaciones')}}">
                        <i class="material-icons">arrow_right_alt</i>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
<!--
tITULO 
-->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
        <div class="row titulo">
            <h3 class="detalle">Historias</h3>
        </div>
    </div>
</div>
<hr>
<!--
    CARDS DE LOS EJERCICIOS 
-->
@if(count($ejercicio)>0)
<div class="row">
    @foreach($ejercicio as $eje)
        <div class="col-lg-6 col-md-12 col-xs-12 col-sm-12">
            <div class="card ">
                <div class="card-header titulo ">
                    <h4 class="card-title">{{$eje->materia}}-
                        <small class="description">{{$eje->tema}}</small>
                    </h4>

                    <div class="mystats text-right">

                        <a class="nav-item menu" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons munu">more_vert</i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{route('detallesEjercicio',['id' => $eje->id])}}"><i class="material-icons">art_track</i> Detalles</a>
                         </div>

                    </div>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
                            <!--
                                color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
                                -->
                            <ul class="nav nav-pills nav-pills-info nav-pills-icons flex-column" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#link1{{$eje->esID}}" role="tablist">
                                        <i class="material-icons">description</i> Ejercicio
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#link2{{$eje->esID}}" role="tablist">
                                        <i class="material-icons">extension</i> Solución
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#link3{{$eje->esID}}" role="tablist">
                                        <i class="material-icons">art_track</i> Detalle
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-8 col-md-8 col-xs-8 col-sm-8">
                            <div class="tab-content">
                                <div class="tab-pane active class_div" id="link1{{$eje->esID}}">
                                  <?php echo $eje->contenido; ?>
                                </div>
                                <div class="tab-pane class_div" id="link2{{$eje->esID}}">
                                     <?php echo $eje->contSol; ?>
                                </div>
                                <div class="tab-pane class_div" id="link3{{$eje->esID}}">
                                    <label><b>Detalle del Ejercicio</b></label>
                                    <hr>
                                    <label>Facultad: </label><p>{{$eje->facultad}}</p>
                                    <label>Escuela: </label><p>{{$eje->escuela}}</p>
                                    <label>Catedra: </label><p>{{$eje->catedra}}</p>
                                    <label>Materia: </label><p>{{$eje->materia}}</p>
                                    <label>Tema: </label><p>{{$eje->tema}}</p>
                                    <label>Dificultad: </label><p>{{$eje->dificultad}}</p>
                                    <label>Tipo de Ejercicio: </label><p>{{$eje->tipo_nombre}}</p>
                                    <label>Usuario Creador: </label><p>{{$eje->usuario_creador}}</p>
                                    <label>Fecha de Creación: </label><p>{{$eje->created_at}}</p>
                                    <label>Usuario Modificación: </label><p>{{$eje->usuario_modificador}}</p>
                                    <label>Ultima Fecha de Modificación: </label><p>{{$eje->updated_at}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     @endforeach
</div>
@else
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
            <h4>No tienes historias recientes </h4>
        </div>
    </div>
@endif

@endsection