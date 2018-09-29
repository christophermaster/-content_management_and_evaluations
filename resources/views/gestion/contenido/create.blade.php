@extends('layouts.admin') @section('contenido')

<div class="row">

    <!--
        Manejador de Errores 
    -->
    <a href="{{url('http://www.wiris.com/plugins/demo/ckeditor/php')}}" title="PHP">
        <input type="hidden" id="php_logo" class="wrs_tech_logo" alt="PHP"></a>
    <h3>Creación de Contenido</h3>
    @if (count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!--
        FORMULARIO PARTA LA META DATA DEL EJERCICIO 

    -->
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-text card-header-primary">
                <div class="card-text">
                    <h4 class="card-title">Ejercicio y Solución</h4>
                    <p class="card-category">formulario para la creacion de ejercicio</p>
                </div>
            </div>
            <div class="card-body">

                {!!Form::open(array('url'=>'gestion/contenido','method'=>'POST','autocomplete'=>'off'))!!} {{Form::token()}}
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <select class="selectpicker" data-size="7" data-style="select-with-transition" title="Materia">
                                <option value="Afghanistan"> Simbolización </option>
                                <option value="Albania"> Simplificacion </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select class="selectpicker" data-size="7" data-style="select-with-transition" title="Tema">
                                <option value="Afghanistan"> Simbolización </option>
                                <option value="Albania"> Simplificacion </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select class="selectpicker" data-size="7" data-style="select-with-transition" title="Sub Tema">
                                <option value="Afghanistan"> Simbolización </option>
                                <option value="Albania"> Simplificacion </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select class="selectpicker" data-size="7" data-style="select-with-transition" title="Dificultad">
                                <option value="Afghanistan"> Facíl </option>
                                <option value="Albania"> Intermedio </option>
                                <option value="Afghanistan"> Dificil </option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="page-categories">
                    <h3 class="title text-center">Contenido</h3>
                    <br />
                    <ul class="nav nav-pills nav-pills-warning nav-pills-icons justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#link7" role="tablist">
                                <i class="material-icons">description</i> Ejercicio
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#link8" role="tablist">
                                <i class="material-icons">extension</i> Solución
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content tab-space tab-subcategories">
                        <div class="tab-pane active" id="link7">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="contenido" id="example" requerid value="{{old('contenido')}}" class="wrs_div_box" contenteditable="true" tabindex="0" spellcheck="true" role="textbox" aria-label="Rich Text Editor, example" title="Rich Text Editor, example">
                                      </textarea>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="link8">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name ="contenidoB" id="exampleA" " contenteditable="true" tabindex="0" spellcheck="true" role="textbox" aria-label="Rich Text Editor, exampleA" title="Rich Text Editor, exampleA">
                                     
                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row">

                </div>

                <div class="row">
                    <div class="col-md-12 text-center">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                        <button class="btn btn-danger" type="reset">Cancelar</button>
                    </div>
                </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>


    <!--TODO ELIMINAR CUANDO TERMINE LA PANTALLA 
    -->
    <div class="wrs_row wrs_padding" style="display:none">
        <div class="wrs_col wrs_s12">
            <div id="container_tab">
                <div id="content_tab">
                    <div class="wrs_div_box wrs_preview" id="preview_div">
                    </div>
                    <div class="wrs_div_box wrs_preview wrs_code" id="htmlcode_div" style="display:none;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="options" style="direction: ltr;" style="display:none">
        <div class="wrs_row wrs_padding">
            <div class="wrs_col wrs_s12 wrs_m6">
                <div class="wrs_row wrs_padding_small">
                    <div class="wrs_col wrs_xs1">
                        <input type="hidden" id="advanced_options_checkbox" onclick="advancedOptions()" />
                    </div>
                </div>
            </div>
        </div>
        <div id="advanced_options" style="display:none">
        </div>
    </div>
</div>






<script>
    CKEDITOR.replace('example', {
        extraPlugins: 'ckeditor_wiris',
        language: 'es'
    });
    CKEDITOR.replace('exampleA', {
        extraPlugins: 'ckeditor_wiris',
        language: 'es'
    });
</script>

@endsection