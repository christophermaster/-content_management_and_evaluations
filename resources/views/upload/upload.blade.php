@extends('layouts.admin')
 @section('contenido')
 <div class="container ">
<div class="breadcrumb">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('gestion/contenido')}}">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Subir Archicos</li>
        </ol>
    </nav>
</div>
    <div class="row text-center">
        <div class="col-md-12 ">
        <h3>Subir Archivo</h3>
		{{ Form::open(array('url' => 'imageUpload', 'method' => 'PUT', 'name'=>'product_images', 'id'=>'dropzone', 'class'=>'dropzone', 'files' => true)) }} 
    <div class="row miform">
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <label for="exampleFormControlSelect2" class="milabel">Facultad</label>
            <select id="faculty" name="id_facultad" class="form-control miInput" data-style="select-with-transition" title="Facultad" data-size="7">
                <option value>Seleccione...</option>
                @foreach($faculty as $fac)
                    <option value="{{$fac->id}}">{{$fac->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <label for="exampleFormControlSelect2" class="milabel">Escuela</label>
            <select id="school" name="id_escuela" class="form-control miInput" data-style="select-with-transition" title="Escuela" data-size="7">
                <option value>Seleccione...</option>
            </select>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <label for="exampleFormControlSelect2" class="milabel">Catedra</label>
            <select id="cathedra" name="id_catedra" class="form-control miInput" data-style="select-with-transition" title="Escuela" data-size="7">
                <option value>Seleccione...</option>
            </select>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <label for="exampleFormControlSelect2" class="milabel">Materia</label>
            <select id="matter" name="id_materia"  data-style="select-with-transition"  class="form-control miInput" data-style="select-with-transition" title="Escuela" data-size="7">
                <option value>Seleccione...</option>
            </select>
        </div>
    </div>
    <div class="row miform">
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <label for="exampleFormControlSelect2" class="milabel">Tema</label>
            <select id="topic" name="id_tema" class="form-control miInput" data-style="select-with-transition" title="Facultad" data-size="7">
                <option value>Seleccione...</option>
            </select>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <label for="exampleFormControlSelect2" class="milabel">Contenido</label>
            <select id="content" name="id_contenido" class="form-control miInput" data-style="select-with-transition" title="Escuela" data-size="7">
                <option value>Seleccione...</option>
            </select>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <label for="exampleFormControlSelect2" class="milabel">Tipo Ejercicio</label>
            <select id="cathdra" name="id_tipo" class="form-control miInput" data-style="select-with-transition" title="Escuela" data-size="7">
                <option value>Seleccione...</option>
                @foreach($tipo_ejercicio as $type)
                    <option value="{{$type->id}}">{{$type->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <label for="exampleFormControlSelect2" class="milabel">Dificultad</label>
            <select id="dificultad" name="id_dificultad"  data-style="select-with-transition"  class="form-control miInput" data-style="select-with-transition" title="Escuela" data-size="7">
                <option value>Seleccione...</option>
                @foreach($dificultad as $dif)
                    <option value="{{$dif->id}}">{{$dif->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
            <div class="dropzone-previews"></div>
            <div class="fallback"> <!-- this is the fallback if JS isn't working -->
                <input name="file" type="file" multiple />
            </div>
            <div class="dz-default dz-message" id="span"> 
            <div>
                <img src="{{asset('img/upload.png')}}" width="250px" height="250px"><br>
            </div>
            <label>Arrastre su Archivo aqui<label> 
            </div>   
        {{ Form::close() }}
        <div class="form-group">
            <button class="btn btn-primary" type="submit" id="submit-all">Guardar</button>
        </div>
        
        </div>
    </div>
 </div>
 <script type="text/javascript">

        Dropzone.options.dropzone =
         {
            autoProcessQueue: false,
            parallelUploads: 1,
            maxFilesize: 1,
            minFilesize: 1,
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
               return time+file.name;
            },
            addRemoveLinks: true,
            timeout: 5000,
            success: function(file, response) 
            {
                console.log(response);
            },
            error: function(file, response)
            {
                return false;
            },
            init: function() {
                dzClosure = this; // Makes sure that 'this' is understood inside the functions below.

                // for Dropzone to process the queue (instead of default form behavior):
                document.getElementById("submit-all").addEventListener("click", function(e) {
                    // Make sure that the form isn't actually being sent.
                    e.preventDefault();
                    e.stopPropagation();
                    dzClosure.processQueue();
                });
 
            },
               /* EL EVENTO ACCEPT NOS PERMITE CAMBIAR LA IMAGEN DE VISTA PREVIA QUE SE MUESTRA */
            accept: function(file, done) {
            var thumbnail = $('.dropzone .dz-preview.dz-file-preview .dz-image:last');
        
            switch (file.type) {
            case 'application/pdf':
                thumbnail.css('background', 'url(data:image/jpeg;base64,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');
                break;
            case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
                thumbnail.css('background', 'url(dist/img/doc.png');
                break;
            case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':
                thumbnail.css('background', 'url(dist/img/excel.png');
                break;
                case 'application/vnd.ms-excel':
                thumbnail.css('background', 'url(dist/img/excel.png');
                break;
                case 'application/zip, application/x-compressed-zip':
                thumbnail.css('background', 'url(dist/img/zip.png');
                break;
                case 'application/vnd.ms-powerpointtd>':
                thumbnail.css('background', 'url(dist/img/ppt.png');
                break;
                case 'application/vnd.openxmlformats-officedocument.presentationml.presentation':
                thumbnail.css('background', 'url(dist/img/ppt.png');
                break;
                case 'image/jpeg':
                break;
                case 'image/png':
                break;
                default:
                thumbnail.css('background', 'url(dist/img/nose.png');
            }
        
            done();
        },
        success: function(file) {
        if (file.previewElement) {

            return file.previewElement.classList.add("dz-success"),
            $(function(){
            setTimeout(function(){
                $('.dz-success').fadeOut('slow');
                $( ".dropzone.dz-started .dz-message" ).show();
            },2500);
            alert("Se guardo");
            });
      
            
        }
        },
        };
        </script>


 @endsection