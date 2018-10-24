@extends('layouts.admin') 
@section('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
        <div class="row titulo">
            <h3 class="detalle">Todas Las Evaluaciones</h3>
        </div>
    </div>
</div>
<hr>
@if(count($temporaryEvaluation)>0)
<div class="row">
    @foreach($temporaryEvaluation as $tem)
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" >
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    @if($tem->id_tipo_evaluacion == 1)
                        <h5 class="card-title">Parcial {{$tem->numero_evaluacion}}</h5>
                    @elseif($tem->id_tipo_evaluacion == 1)
                        <h5 class="card-title">Quiz {{$tem->numero_evaluacion}}</h5>
                    @else
                        <h5 class="card-title">Actividad {{$tem->numero_evaluacion}}</h5>
                    @endif
                    <h6 class="card-subtitle mb-2 text-muted">{{$tem->tema}}</h6>
                    <p class="card-text">{{$tem->fecha}}</p>
                    <a href="{{route('evaluacion',['id' => $tem->id])}}" class="card-link">ver</a>
                    <a href="{{route('evaluacion',['id' => $tem->id])}}" class="card-link">Imprimir</a>
                </div>
                @include('gestion.evaluacion.modal')
            </div>
    </div>
    @endforeach
</div>
@else
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
            <h4>No hay evaluaciones</h4>
        </div>
    </div>
@endif

<hr>
@endsection