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
                <div class="blog-card bCard">
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
                    <div class="description des">
                        <p class="read-more">
                            <a href="{{route('detallesEjercicio',['id' => $ejer->id])}}">Ver más</a>
                        </p>
                        <h1>{{$ejer->tema}}</h1>
                        <h2>{{$ejer->nombre_contenido}}</h2>
                        <p><?php echo $ejer->contenido; ?> </p>
                        
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="row">

  
    @foreach($upload as $upl)
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div class="card " style=" height:18rem " >
                @if($upl->tipo_archivo == "image/png" )
                    <img  rel="tooltip" title="Expandir" class="card-img-top myImg" src="{{asset($upl->ruta)}}" id="{{$upl->id}}" alt="Card image cap" height="140px" width="200px" onclick="ampliar({{$upl->id}})">
                @elseif($upl->tipo_archivo == "application/pdf" )
                    <img  rel="tooltip" title="Expandir" class="card-img-top myImg" src="{{asset('img/pdf.png')}}" id="{{$upl->id}}" alt="Card image cap" height="140px" width="200px" onclick="ampliar({{$upl->id}})">
                @elseif($upl->tipo_archivo == "application/vnd.openxmlformats-officedocument.wordprocessingml.document" )
                    <img  rel="tooltip" title="Expandir" class="card-img-top myImg" src="{{asset('img/doc.png')}}" id="{{$upl->id}}" alt="Card image cap" height="140px" width="200px" onclick="ampliar({{$upl->id}})">
                @elseif($upl->tipo_archivo == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" || $upl->tipo_archivo == "application/vnd.ms-excel" )
                    <img  rel="tooltip" title="Expandir" class="card-img-top myImg" src="{{asset('img/excel.png')}}" id="{{$upl->id}}" alt="Card image cap" height="140px" width="200px" onclick="ampliar({{$upl->id}})">
                @elseif($upl->tipo_archivo == "application/zip, application/x-compressed-zip" )
                    <img  rel="tooltip" title="Expandir" class="card-img-top myImg" src="{{asset('img/rar.png')}}" id="{{$upl->id}}" alt="Card image cap" height="140px" width="200px" onclick="ampliar({{$upl->id}})">
                @elseif($upl->tipo_archivo == "application/vnd.ms-powerpointtd>" ||$upl->tipo_archivo == "application/vnd.openxmlformats-officedocument.presentationml.presentation"  )
                    <img  rel="tooltip" title="Expandir" class="card-img-top myImg" src="{{asset('img/ppt.png')}}" id="{{$upl->id}}" alt="Card image cap" height="140px" width="200px" onclick="ampliar({{$upl->id}})">
                @endif
                <hr>
                <div class="card-body miScrool">
                    <h4 class="card-title"><b>{{$upl->titulo}}</b></h4>
                    
                    <p class="card-text">{{$upl->descripcion}}cloud_downloadcloud_downloadcloud_downloadcloud_downloadcloud_download</p>
                </div>
                <div class="card-footer text-center" >
                    <a  href="{{route('downloadFile',['id' => $upl->id])}}" rel="tooltip" title="Descargar" class="card-link"><i class="material-icons">cloud_download</i></a>
                    <a class="card-link" href="#" data-toggle="modal" data-target="#modal{{$upl->id}}" rel="tooltip" title="Detalle"><i class="material-icons">edit</i></a>
                    <a class="card-link" href="#" data-toggle="modal" data-target="#modal{{$upl->id}}" rel="tooltip" title="Eliminar"><i class="material-icons">clear</i></a>
                </div>
            </div>
        </div>
            <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="modal{{$upl->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalles - {{$upl->titulo}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              
            </div>
              <hr>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <label for="" class="">Facultad: </label> <p>{{$upl->facultad}}</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                         <label for="" class="">Escuela: </label><p>{{$upl->escuela}}</p> 
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                         <label for="" class="">Catedra: </label><p>{{$upl->catedra}}</p> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <label for="" class="">Materia: </label> <p>{{$upl->materia}}</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                         <label for="" class="">Tema: </label><p>{{$upl->tema}}</p> 
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                         <label for="" class="">contenido: </label><p>{{$upl->contenido}}</p> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <label for="" class="">Categoria: </label> <p>{{$upl->categoria}}</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                         <label for="" class="">Usaurio: </label><p>{{$upl->usuario_creador}}</p> 
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                         <label for="" class="">fecha: </label><p>{{$upl->created_at}}</p> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <label for="" class="">Nombre: </label> <p>{{$upl->titulo}}</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                         <label for="" class="">Peso: </label><p>{{$upl->usuario_creador}}</p> 
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                         <label for="" class="">Tipo: </label><p>{{$upl->tipo_archivo}}</p> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label for="" class="">Descripción: </label> <p>{{$upl->descripcion}}</p>
                    </div>
                  
                </div>
                <hr>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
            </div>
        </div>
        </div>
    @endforeach
          </div>
    </div>
    <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">.s..</div>
</div>
<!-- The Modal -->
<div id="myModal" class="modal modall">
  <span id ="close" class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>


<script>
    function ampliar(id){
        console.log(id);
        var modal = document.getElementById('myModal');

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById(id);
        var a = document.getElementById('a'+id);
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function(){
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }
        
        


    }
   

</script>
<script>
        // Get the <span> element that closes the modal
   // var span = document.getElementsByClassName("close")[0];
    var span = document.getElementById('close');
    var modal = document.getElementById('myModal');
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() { 
        modal.style.display = "none";
    }
</script>
<style>
body {font-family: Arial, Helvetica, sans-serif;}

.myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}
.miScrool{
    overflow: auto;
}
.myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modall {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
</style>

@endsection