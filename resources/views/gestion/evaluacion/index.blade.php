@extends('layouts.admin') @section('contenido')
<div class="breadcrumb">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="{{ URL::previous() }}"><i class="material-icons">
            arrow_back</i>Atras</a></li>
        </ol>
    </nav>
</div>
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
{!!Form::open(array('url'=>'salvar/evaluacion','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
{{Form::token()}}
    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="row miform">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <label for="exampleFormControlSelect2" class="milabel">Facultad</label>
                        <select id="faculty" name="id_facultad" class="form-control miInput" data-style="select-with-transition" title="Facultad" data-size="7" required>
                            <option value>Seleccione...</option>
                            @foreach($faculty as $fac)
                            <option value="{{$fac->id}}">{{$fac->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <label for="exampleFormControlSelect2" class="milabel">Escuela</label>
                        <select id="school" name="id_escuela" class="form-control miInput" data-style="select-with-transition" title="Escuela" data-size="7" required>
                            <option value>Seleccione...</option>
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <label for="exampleFormControlSelect2" class="milabel">Catedra</label>
                        <select id="cathedra" name="id_catedra" class="form-control miInput" data-style="select-with-transition" title="Escuela" data-size="7" required>
                            <option value>Seleccione...</option>
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <label for="exampleFormControlSelect2" class="milabel">Materia</label>
                        <select id="matter" name="id_materia" data-style="select-with-transition" class="form-control miInput" data-style="select-with-transition" title="Escuela" data-size="7" required>
                            <option value>Seleccione...</option>
                        </select>
                    </div>
                </div>
                <div class="row miform">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <label for="exampleFormControlSelect2" class="milabel">Tema</label>
                        <select id="topic" name="id_tema" class="form-control miInput" data-style="select-with-transition" title="Facultad" data-size="7" required>
                            <option value>Seleccione...</option>
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <label for="exampleFormControlSelect2" class="milabel">Número de evaluación</label>
                        <select id="" name="numero_evaluacion" class="form-control miInput" data-style="select-with-transition" title="Facultad" data-size="7" required>
                            <option value>Seleccione...</option>
                            @foreach($numero_evaluacion as $num)
                            <option value="{{$num->id}}">{{$num->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <label for="exampleFormControlSelect2" class="milabel">Evaluación</label>
                        <select id="" name="id_tipo_evaluacion" class="form-control miInput" data-style="select-with-transition" title="Facultad" data-size="7" required>
                            <option value>Seleccione...</option>
                            @foreach($tipo_evaluacion as $tip)
                            <option value="{{$tip->id}}">{{$tip->nombre}}</option>
                            @endforeach>
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <label for="exampleFormControlSelect2" class="milabel">Tipo de evaluación</label>
                        <select id="" name="id_subtipo_evaluacion" class="form-control miInput" data-style="select-with-transition" title="Facultad" data-size="7" required>
                            <option value>Seleccione...</option>
                           @foreach($subtipo_evaluacion as $sub)
                            <option value="{{$sub->id}}">{{$sub->nombre}}</option>
                            @endforeach>
                        </select>
                    </div>

                </div>
                <div class="row miform">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <label for="exampleFormControlSelect2" class="milabel">Fecha de la evaluación</label>
                        <div class="form-group">
                            <input type="date" class="form-control miInput" name="fecha">
                        </div>
                    </div>
                </div>
                <div class="row miform text-center">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <button class ="btn btn-primary" type="submit">Crear Parcial</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
{!!Form::close()!!}


<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
        <div class="row titulo">
            <h3 class="detalle">Evaluaciones Pendientes</h3>
        </div>
    </div>
</div>
<hr>
@if(count($temporaryEvaluation)>0)
<div class="row">
    @foreach($temporaryEvaluation as $tem)
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




<hr>
@endsection