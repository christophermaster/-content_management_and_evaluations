@extends('layouts.admin') @section('contenido')

<div class="row">

    <div class="col-md-12 text-center">
        <h1>RECURSOS EN LINEAS</h1>
        <hr>
    </div>
    <div class="col-md-12 text-center">
        <p>
            El repositorio de la Facultad de Ciencias y Tecnologías albergan Ejercicios,Soluciones, bibliografía, y materiales digitalizados, subidos y creador por los miembros de la comunidad UC-FACYT y las facultades adscritas a la Universidad de carabobo.
        </p>
    </div>
    <br>

    <div class="col-md-12 text-center ">
        <h3><b>Repositorio de la Facultad de Ciencias y Tecnologías</b></h3>
        <br><br><br>
    </div>


    <div class="row">
        <div class="col-md-4">
            <div class="card card-product">
                <div class="card-header card-header-image" data-header-animation="true">
                    <a href="#pablo">
                        <img class="img" src="{{asset('img/card-2.jpg')}}" width="400" height="300">
                    </a>
                </div>
                <div class="card-body">
                    <div class="card-actions text-center">

                        <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="View">
                            <i class="material-icons">art_track</i>
                        </button>

                    </div>
                    <h4 class="card-title">
                        <a href="{{route('materialDigitalizado')}}"><b>Repositorio de material digitalizado</b></a>
                    </h4>
                    <div class="card-description">
                        Reúne los contenidos digitales producidos por la comunidad universitaria resultantes de su actividad docente, investigadora e institucional.
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-product">
                <div class="card-header card-header-image" data-header-animation="true">
                    <a  href="{{route('materialDigitalizado')}}">
                        <img class="img" src="{{asset('img/card-3.jpg')}}" width="400" height="300">
                    </a>
                </div>
                <div class="card-body">
                    <div class="card-actions text-center">

                        <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="View">
                            <i class="material-icons">art_track</i>
                        </button>

                    </div>
                    <h4 class="card-title">
                        <a href="{{route('repositorioEjerSol')}}"><b>Repositorio de Ejercicios y Soluciones</b></a>
                    </h4>
                    <div class="card-description">
                        Reúne los ejercicios y su soluciones producidas por la comunidad docente de la institución universitaria de la Facyt.
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-product">
                <div class="card-header card-header-image" data-header-animation="true">
                    <a href="#pablo">
                        <img class="img" src="{{asset('img/card-1.jpg')}}" width="400" height="300">
                    </a>
                </div>
                <div class="card-body">
                    <div class="card-actions text-center">

                        <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="View">
                            <i class="material-icons">art_track</i>
                        </button>

                    </div>
                    <h4 class="card-title">
                        <a href="{{url('gestioni/contenido/todas/evaluaciones')}}"><b>Repositorio de Evaluaciones</b></a>
                    </h4>
                    <div class="card-description">
                        Reúne las evaluaciones producidas por la comunidad docente de la institución universitaria de la Facyt.
                    </div>
                </div>

            </div>
        </div>


    </div>



</div>


@endsection