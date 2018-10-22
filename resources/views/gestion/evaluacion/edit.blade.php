@extends('layouts.admin') @section('contenido')
<div class="breadcrumb">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('gestion/contenido')}}">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{url('generar/evaluacion')}}">Genarar
                    Evaluacion</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar Evaluación</li>
        </ol>
    </nav>
</div>
<!--Detalles para editar-->
<form method="post" action="/evaluacion/modificar/{{$evaluacion->id}}" >
    @csrf
    <input type="hidden" value="{{csrf_token()}}" name="_token" /> 
    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="row miform">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <label for="exampleFormControlSelect2" class="milabel">Facultad</label>
                        <select id="facultyy" name="id_facultad" class="form-control miInput" data-style="select-with-transition" title="Facultad" data-size="7" required>
                            <option value>Seleccione...</option>
                            @foreach($faculty as $fac)
							@if($fac->id == $evaluacion->id_facultad)
							<option value="{{$fac->id}}" selected>{{$fac->nombre}}</option>
							@else
							<option value="{{$fac->id}}">{{$fac->nombre}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <label for="exampleFormControlSelect2" class="milabel">Escuela</label>
                        <select id="schooll" name="id_escuela" class="form-control miInput" data-style="select-with-transition" title="Escuela" data-size="7" required>
                            <option value>Seleccione...</option>
                            @foreach($escuela as $esc)
							@if($esc->id == $evaluacion->id_escuela)
							<option value="{{$esc->id}}" selected>{{$esc->nombre}}</option>
							@else
							<option value="{{$esc->id}}">{{$esc->nombre}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <label for="exampleFormControlSelect2" class="milabel">Catedra</label>
                        <select id="cathedraa" name="id_catedra" class="form-control miInput" data-style="select-with-transition" title="Escuela" data-size="7" required>
                            <option value>Seleccione...</option>
                            @foreach($catedra as $cat)
							@if($cat->id == $evaluacion->id_catedra)
							<option value="{{$cat->id}}" selected>{{$cat->nombre}}</option>
							@else
							<option value="{{$cat->id}}">{{$cat->nombre}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <label for="exampleFormControlSelect2" class="milabel">Materia</label>
                        <select id="matterr" name="id_materia" data-style="select-with-transition" class="form-control miInput" data-style="select-with-transition" title="Escuela" data-size="7" required>
                            <option value>Seleccione...</option>
                            @foreach($materia as $mat)
							@if($mat->id == $evaluacion->id_materia)
							<option value="{{$mat->id}}" selected>{{$mat->nombre}}</option>
							@else
							<option value="{{$mat->id}}">{{$mat->nombre}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row miform">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <label for="exampleFormControlSelect2" class="milabel">Tema</label>
                        <select id="topicc" name="id_tema" class="form-control miInput" data-style="select-with-transition" title="Facultad" data-size="7" required>
                            <option value>Seleccione...</option>
                            @foreach($tema as $tem)
							@if($tem->id == $evaluacion->id_tema)
							<option value="{{$tem->id}}" selected>{{$tem->nombre}}</option>
							@else
							<option value="{{$tem->id}}">{{$tem->nombre}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <label for="exampleFormControlSelect2" class="milabel">Número de evaluación</label>
                        <select id="" name="numero_evaluacion" class="form-control miInput" data-style="select-with-transition" title="Facultad" data-size="7" required>
                            <option value>Seleccione...</option>
                           @foreach($numero_evaluacion as $num)
							@if($num->nombre == $evaluacion->numero_evaluacion)
							<option value="{{$num->id}}" selected>{{$num->nombre}}</option>
							@else
							<option value="{{$num->id}}">{{$num->nombre}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <label for="exampleFormControlSelect2" class="milabel">Evaluación</label>
                        <select id="" name="id_tipo_evaluacion" class="form-control miInput" data-style="select-with-transition" title="Facultad" data-size="7" required>
                            <option value>Seleccione...</option>
                            @foreach($tipo_evaluacion as $tip)
							@if($tip->id == $evaluacion->id_tipo_evaluacion)
							<option value="{{$tip->id}}" selected>{{$tip->nombre}}</option>
							@else
							<option value="{{$tip->id}}">{{$tip->nombre}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <label for="exampleFormControlSelect2" class="milabel">Tipo de evaluación</label>
                        <select id="" name="id_subtipo_evaluacion" class="form-control miInput" data-style="select-with-transition" title="Facultad" data-size="7" required>
                            <option value>Seleccione...</option>
                            @foreach($subtipo_evaluacion as $tip)
							@if($tip->id == $evaluacion->id_subtipo_evaluacion)
							<option value="{{$tip->id}}" selected>{{$tip->nombre}}</option>
							@else
							<option value="{{$tip->id}}">{{$tip->nombre}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="row miform">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <label for="exampleFormControlSelect2" class="milabel">Fecha de la evaluación</label>
                        <div class="form-group">
                            <input type="date" class="form-control miInput" name="fecha" value="{{$evaluacion->fecha}}">
                        </div>
                    </div>
                </div>
                <div class="row miform text-center">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <button class ="btn btn-primary" type="submit">Modificar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>



<!--Ejercicio Seleccionado-->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
        <div class="row titulo">
            <h3 class="detalle">Ejercicios Seleccionado</h3>
            <div class="mystats miEditar">
            </div>
        </div>
    </div>
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
                        <div class="card-header" role="tab" id="headingOne">
                            <h5 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    Ejercicios Seleccionados
                                    <i class="material-icons">import_export</i>
                                </a>
                            </h5>
                        </div>
                        <!--
                            BODY
                        -->
                        <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <th>Contenido</th>
                                                    <th>Dificultad</th>
                                                    <th>Tipo</th>
                                                    <th>Opciones</th>
                                                </thead>

                                                @foreach($exerciseTemporaryEvaluation as $exer)
                                                <tr>
                                                    <td><?php echo $exer ->contenido ?></td>
                                                    <td>{{$exer ->dificultad}}</td>
                                                    <td>{{$exer ->tipo_nombre}}</td>
                                                    <td class="td-actions">
                                                        <a href="">
                                                            <button type="button" rel="tooltip" class="btn btn-info btn-link" data-original-title="Ver Carreras" title="Ver escuelas">
                                                                <i class="material-icons">visibility</i>
                                                            </button>
                                                        </a>
                                                        <a href="" data-toggle="modal">
                                                            <button type="button" rel="tooltip" class="btn btn-danger btn-link" data-original-title="Eliminar" title="Eliminar">
                                                                <i class="material-icons">close</i>
                                                            </button>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @include('administration.university.faculty.modal') 
                                                @endforeach
                                            </table>
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
</div>

<hr>



<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
        <div class="row titulo">
            <h3 class="detalle">Seleccione Los Ejercicios</h3>
        </div>
    </div>
</div>
<hr>
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
                                        @include('gestion.evaluacion.search')
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
{!!Form::open(array('url'=>'agregar/ejercicio','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
{{Form::token()}}
<div class="row">
    <input type="hidden" name ="id_temporal_evaluation" value="{{$id_temporal_evaluation}}">

    @foreach($ejercicio as $ejer)
    <input type="hidden" name ="id_ejercicio" value="{{$ejer->id}}">
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
               <button class ="btn btn-primary" type="submit">Agregar</button>
            </p>
            <h1>{{$ejer->tema}}</h1>
            <h2>{{$ejer->nombre_contenido}}</h2>
            <p>
                <?php echo $ejer->contenido; ?>
            </p>

        </div>
    </div>
    @endforeach
</div>
{!!Form::close()!!}
@endsection