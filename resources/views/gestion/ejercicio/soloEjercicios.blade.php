@extends('layouts.admin') @section('contenido')
<div class="breadcrumb">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('gestion/contenido')}}">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{url('mis/ejercicios')}}">Detalles de mis
                    Ejercicios</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ejercicios</li>
        </ol>
    </nav>
</div>

<ul class="nav nav-tabs nav-tab" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link a active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="material-icons">
category
</i>Ejercicios</a>
    </li>
    <li class="nav-item">
        <a class="nav-link a" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="material-icons">
<!--extension-->cloud_upload
</i>Ejercicios Subidos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link a" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false"><i class="material-icons">
<!--favorite-->list_alt
</i>Ejercicios Utizado</a>
    </li>
</ul>

<div class="tab-content">

    <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="container">
            @foreach($ejercicio as $ejer)
                <div class="blog-card">
                    <div class="meta">
                        @if($ejer->id_tema == 1)
                         <div class="photoo" style="background-image: url('{{asset('img/logica.jpg')}}')"></div>
                        @elseif($ejer->id_tema == 2)
                         <div class="photoo"  style="background-image: url('{{asset('img/conjunto.png')}}')"></div>
                        @elseif($ejer->id_tema == 3)
                         <div class="photoo"  style="background-image: url('{{asset('img/relaciones.jpg')}}')"></div>
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
                    <div class="description">
                        <h1>{{$ejer->tema}}</h1>
                        <h2>{{$ejer->nombre_contenido}}</h2>
                        <p><?php echo $ejer->contenido; ?> </p>
                        <p class="read-more">
                            <a href="{{route('detallesEjercicio',['id' => $ejer->id])}}">Ver más</a>
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">...s</div>
    <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">.s..</div>
</div>

@endsection