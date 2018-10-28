@extends('layouts.admin') @section('contenido')
<div class="breadcrumb">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="{{ URL::previous() }}"><i class="material-icons">
            arrow_back</i>Atras</a></li>
        </ol>
    </nav>
</div>
<!-- FILTRAR LOS EJERCICIOS -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div id="accordion" role="tablist">
                    <div class="card-collapse">
                        <!--ENCABEZADO-->
                        <div class="card-header" role="tab" id="headingTwo">
                            <h5 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" href="#collapseTwo"
                                    aria-expanded="false" aria-controls="collapseTwo">
                                    Filtrar
                                    <i class="material-icons">import_export</i>
                                </a>
                            </h5>
                        </div>
                        <!--BODY-->
                        <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo"
                            data-parent="#accordion">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                       
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

<ul class="nav nav-tabs nav-tab" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link a active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
            aria-selected="true"><i class="material-icons">
                assignment_turned_in
            </i>Evaluaciones Realizadas</a>
    </li>
    <li class="nav-item">
        <a class="nav-link a" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
            aria-selected="false"><i class="material-icons">
                assignment
            </i>Evaluaciones Pendientes</a>
    </li>

</ul>

<div class="tab-content">
    <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                <div class="row titulo">
                    <h3 class="detalle">Evaluaciones Realizadas</h3>

                    <div class="mystats miEditar">
                        <a class="nav-item menu" href="{{url('gestion/ejercicio/create')}}" rel="tooltip" title="Agregar">
                            <i class="material-icons munu">add</i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <hr>
@if(count($evaluacionesRealizadas)>0)
    <div class="row">
        @foreach($evaluacionesRealizadas as $tem)
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" >
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        @if($tem->id_tipo_evaluacion == 1)
                            <h5 class="card-title">Parcial {{$tem->numero_evaluacion}}</h5>
                        @elseif($tem->id_tipo_evaluacion == 2)
                            <h5 class="card-title">Quiz {{$tem->numero_evaluacion}}</h5>
                        @else
                            <h5 class="card-title">Actividad {{$tem->numero_evaluacion}}</h5>
                        @endif
                        <h6 class="card-subtitle mb-2 text-muted">{{$tem->tema}}</h6>
                        <p class="card-text">{{$tem->fecha}}</p>
                         <a href="{{route('evaluacion',['id' => $tem->id])}}" class="card-link">ver</a>
                         <a href="{{route('vistaEvaluacion',['id' => $tem->id])}}" class="card-link">Generar</a>
                    </div>
                    
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
            <h4>No tienes evaluaciones Realizadas</h4>
        </div>
    </div>
@endif

    </div>

    <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                <div class="row titulo">
                    <h3 class="detalle">Evaluaciones Pendientes</h3>
                </div>
            </div>
        </div>
@if(count($evaluacionesPendientes)>0)
    <div class="row">
        @foreach($evaluacionesPendientes as $tem)
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" >
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        @if($tem->id_tipo_evaluacion == 1)
                            <h5 class="card-title">Parcial {{$tem->numero_evaluacion}}</h5>
                        @elseif($tem->id_tipo_evaluacion == 2)
                            <h5 class="card-title">Quiz {{$tem->numero_evaluacion}}</h5>
                        @else
                            <h5 class="card-title">Actividad {{$tem->numero_evaluacion}}</h5>
                        @endif
                        <h6 class="card-subtitle mb-2 text-muted">{{$tem->tema}}</h6>
                        <p class="card-text">{{$tem->fecha}}</p>
                        <a class="card-link" href="" data-target="#modal-delete-{{$tem->id}}" data-toggle="modal" >Eliminar</a>
                        <a href="{{route('editarEvaluacion',['id' => $tem->id])}}" class="card-link">Editar</a>
                    <!-- <a href="{{route('evaluacion',['id' => $tem->id])}}" class="card-link">ver</a>-->
                        <a href="{{route('vistaEvaluacion',['id' => $tem->id])}}" class="card-link">Generar</a>
                    </div>
                    @include('gestion.evaluacion.modal')
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
            <h4>No tienes evaluaciones pendientes</h4>
        </div>
    </div>
@endif

       
    </div>
</div>

@endsection