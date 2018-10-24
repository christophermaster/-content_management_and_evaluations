@extends('layouts.admin') @section('contenido')
<div class="breadcrumb">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('gestion/contenido')}}">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{url('generar/evaluacion')}}">Genarar
                    Evaluacion</a></li>
            <li class="breadcrumb-item active" aria-current="page">Crear Evaluacion</li>
        </ol>
    </nav>
</div>

<div div="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
        <a href="{{route('vistaEvaluacion',['id' => $id_temporal_evaluation])}}">
            <button type="button" class="btn btn-primary ">
            Generar Evaluacion
            </button>
        </a>
    </div>
</div>

<!--Ejercicio Seleccionado-->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="row titulo">
            <h3 class="detalle">Ejercicios Seleccionado</h3>
            <!--<div class="mystats miEditar">
                <a class="nav-item menu" href="{{url('gestion/contenido/materiales/digitalizados/subi')}}" rel="tooltip" title="Agregar">
                    <i class="material-icons munu">add</i>
                </a>
            </div>-->
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
                                    Ejercicio Seleccionado
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
                                                      <!--  <a href="">
                                                            <button type="button" rel="tooltip" class="btn btn-info btn-link" data-original-title="Ver Carreras" title="Ver escuelas">
                                                                <i class="material-icons">visibility</i>
                                                            </button>
                                                        </a>-->
                                                        <form method="delete" action="/ejercicio/elejido/parcial/{{$exer->id}}/{{$id_temporal_evaluation}}" >
                                                            <button type="submit" rel="tooltip" class="btn btn-danger btn-link" data-original-title="Eliminar" title="Eliminar">
                                                                <i class="material-icons">close</i>
                                                            </button>
                                                        </form>
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
            <h3 class="detalle">Selecciones Los Ejercicios</h3>
           <!-- <div class="mystats miEditar">
                <a class="nav-item menu" href="{{url('gestion/contenido/materiales/digitalizados/subi')}}" rel="tooltip" title="Agregar">
                    <i class="material-icons munu">add</i>
                </a>
            </div>-->
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
@foreach($ejercicio as $ejer)
{!!Form::open(array('url'=>'agregar/ejercicio','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
{{Form::token()}}
<div class="row">
    <input type="hidden" name ="id_temporal_evaluation" value="{{$id_temporal_evaluation}}">


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
  
</div>
{!!Form::close()!!}
  @endforeach
@endsection