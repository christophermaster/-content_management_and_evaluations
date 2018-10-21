@extends('layouts.admin') @section('contenido')
<div class="container ">
    <div class="breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('gestion/contenido')}}">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{url('materiales/digitalizados')}}">Material Digitalizado</a></li>
                <li class="breadcrumb-item active" aria-current="page">Subir Archicos</li>
            </ol>
        </nav>
    </div>
    <div class="row text-center">
        <div class="col-md-12 ">
            <h3>Subir Archivo</h3>
            {{ Form::open(array('url' => 'imageUpload', 'method' => 'PUT', 'name'=>'product_images', 'id'=>'dropzone', 'class'=>'dropzone', 'files' => true)) }}
            <div class="row miform">
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <label for="exampleFormControlSelect2" class="milabel">Facultad</label>
                    <select id="faculty" name="id_facultad" class="form-control miInput" data-style="select-with-transition" title="Facultad" data-size="7" required>
                        <option value>Seleccione...</option>
                        @foreach($faculty as $fac)
                        <option value="{{$fac->id}}">{{$fac->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <label for="exampleFormControlSelect2" class="milabel">Escuela</label>
                    <select id="school" name="id_escuela" class="form-control miInput" data-style="select-with-transition" title="Escuela" data-size="7" required>
                        <option value>Seleccione...</option>
                    </select>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <label for="exampleFormControlSelect2" class="milabel">Catedra</label>
                    <select id="cathedra" name="id_catedra" class="form-control miInput" data-style="select-with-transition" title="Escuela" data-size="7" required>
                        <option value>Seleccione...</option>
                    </select>
                </div>

            </div>
            <div class="row miform">
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <label for="exampleFormControlSelect2" class="milabel">Materia</label>
                    <select id="matter" name="id_materia" data-style="select-with-transition" class="form-control miInput" data-style="select-with-transition" title="Escuela" data-size="7" required>
                        <option value>Seleccione...</option>
                    </select>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <label for="exampleFormControlSelect2" class="milabel">Tema</label>
                    <select id="topic" name="id_tema" class="form-control miInput" data-style="select-with-transition" title="Facultad" data-size="7" required>
                        <option value>Seleccione...</option>
                    </select>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <label for="exampleFormControlSelect2" class="milabel">Contenido</label>
                    <select id="content" name="id_contenido" class="form-control miInput" data-style="select-with-transition" title="Escuela" data-size="7" required>
                        <option value>Seleccione...</option>
                    </select>
                </div>

            </div>

            <div class="row miform">
                <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                    <label class="milabel">Titulo</label>
                    <div class="form-group">
                        <input type="text" name="titulo"class="form-control miInput" required>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <label for="exampleFormControlSelect2" class="milabel">Categoría</label>
                    <select id="categoria" name="id_categoria" class="form-control miInput" data-style="select-with-transition" title="Escuela" data-size="7" required>
                        <option value>Seleccione...</option>
                        <option value="1">Ejercicios</option>
                        <option value="2">Parciales</option>
                        <option value="3">Material de apoyo</option>
                    </select>
                </div>
            </div>

            <div class="row miform">
                <div class="col-md-12">    
                    <label class="milabel">Descripción.</label>
                    <div class="form-group">
                        <textarea class="form-control miInput" name ="descripcion" rows="5" required></textarea>
                    </div>              
                </div>
            </div>

            <div class="dropzone-previews"></div>
            <div class="fallback">
                <!-- this is the fallback if JS isn't working -->
                <input name="file" type="file" multiple />
            </div>
            <div class="dz-default dz-message" id="span">
                <div>
                    <img src="{{asset('img/upload.png')}}" width="250px" height="250px"><br>
                </div>
                <label>Arrastre su Archivo aqui<label>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" id="submit-all">Guardar</button>
            </div>
            {{ Form::close() }}

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
            renameFile: function (file) {
                var dt = new Date();
                var time = dt.getTime();
                return time + file.name;
            },
            addRemoveLinks: true,
            timeout: 5000,
            success: function (file, response) {
                console.log(response);
            },
            error: function (file, response) {
                return false;
            },
            init: function () {
                dzClosure = this; // Makes sure that 'this' is understood inside the functions below.

                // for Dropzone to process the queue (instead of default form behavior):
                document.getElementById("submit-all").addEventListener("click", function (e) {
                    // Make sure that the form isn't actually being sent.
                    e.preventDefault();
                    e.stopPropagation();
                    dzClosure.processQueue();
                });

            },
            /* EL EVENTO ACCEPT NOS PERMITE CAMBIAR LA IMAGEN DE VISTA PREVIA QUE SE MUESTRA */
            accept: function (file, done) {
                var thumbnail = $('.dropzone .dz-preview.dz-file-preview .dz-image:last');

                switch (file.type) {
                    case 'application/pdf':
                        thumbnail.css('background', 'url(img/ppt.png)');
                        break;
                    case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
                        thumbnail.css('background', 'url(img/doc.png)');
                        break;
                    case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':
                        thumbnail.css('background', 'url(img/excel.png)');
                        break;
                    case 'application/vnd.ms-excel':
                        thumbnail.css('background', 'url(img/excel.png)');
                        break;
                    case 'application/zip, application/x-compressed-zip':
                        thumbnail.css('background', 'url(img/rar.png)');
                        break;
                    case 'application/vnd.ms-powerpointtd>':
                        thumbnail.css('background', 'url(img/ppt.png)');
                        break;
                    case 'application/vnd.openxmlformats-officedocument.presentationml.presentation':
                        thumbnail.css('background', 'url(img/ppt.png)');
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
            success: function (file) {
                if (file.previewElement) {

                    return file.previewElement.classList.add("dz-success"),
                        $(function () {
                            setTimeout(function () {
                                $('.dz-success').fadeOut('slow');
                                $(".dropzone.dz-started .dz-message").show();
                            }, 2500);
                            alert("Se guardo");
                        });
                }
            },
        };
</script>
@endsection