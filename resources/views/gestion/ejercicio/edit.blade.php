@extends('layouts.admin') @section('contenido')
<div class="breadcrumb">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"> <a href="{{ URL::previous() }}"><i class="material-icons">
            arrow_back</i>Atras</a></li>
        </ol>
    </nav>
</div>
<a href="{{url('http://www.wiris.com/plugins/demo/ckeditor/php')}}" title="PHP">
    <input type="hidden" id="php_logo" class="wrs_tech_logo" alt="PHP"></a>

<!--
        Manejador de Errores 
    -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
        <h2>Editar Ejercicio</h2>
        <hr> @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @else @include('flash::message') @endif
    </div>
</div>

<div class="row recuadro">
    <br>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <!--Detalles para editar-->
        <form method="post" action="/gestion/contenido/mis/publicaciones/ejercicios/detalles/editar/{{$ejercicio->id}}">
            @csrf
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <div class="row miform">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <label for="exampleFormControlSelect2" class="milabel">Facultad</label>
                    <select id="facultyy" name="id_facultad" class="form-control miInput" data-style="select-with-transition" title="Facultad" data-size="7" required>
                        <option value>Seleccione...</option>
                        @foreach($faculty as $fac)
                        @if($fac->id == $ejercicio->id_facultad)
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
                        @if($esc->id == $ejercicio->id_escuela)
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
                        @if($cat->id == $ejercicio->id_catedra)
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
                        @if($mat->id == $ejercicio->id_materia)
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
                    <select id="topic" name="id_tema" class="form-control miInput" data-style="select-with-transition" title="Facultad" data-size="7">
						<option value>Seleccione...</option>
						@foreach($tema as $tem)
                        @if($tem->id == $ejercicio->id_tema)
                        <option value="{{$tem->id}}" selected>{{$tem->nombre}}</option>
                        @else
                        <option value="{{$tem->id}}">{{$tem->nombre}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <label for="exampleFormControlSelect2" class="milabel">Contenido</label>
                    <select id="content" name="id_contenido" class="form-control miInput" data-style="select-with-transition" title="Escuela" data-size="7">
						<option value>Seleccione...</option>
						@foreach($contenido as $cont)
                        @if($cont->id == $ejercicio->id_contenido)
                        <option value="{{$cont->id}}" selected>{{$cont->nombre}}</option>
                        @else
                        <option value="{{$cont->id}}">{{$cont->nombre}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <label for="exampleFormControlSelect2" class="milabel">Tipo Ejercicio</label>
                    <select id="cathdra" name="id_tipo" class="form-control miInput" data-style="select-with-transition" title="Escuela" data-size="7">
                        <option value>Seleccione...</option>
                        @foreach($tipo_ejercicio as $tipo)
                        @if($tipo->id == $ejercicio->id_tipo)
                        <option value="{{$tipo->id}}" selected>{{$tipo->nombre}}</option>
                        @else
                        <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <label for="exampleFormControlSelect2" class="milabel">Dificultad</label>
                    <select id="dificultad" name="id_dificultad" data-style="select-with-transition" class="form-control miInput" data-style="select-with-transition" title="Escuela" data-size="7">
						<option value>Seleccione...</option>
						 @foreach($dificultad as $dif)
                        @if($dif->id == $ejercicio->id_dificultad)
                        <option value="{{$dif->id}}" selected>{{$dif->nombre}}</option>
                        @else
                        <option value="{{$dif->id}}">{{$dif->nombre}}</option>
                        @endif
                        @endforeach
             
                    </select>
                </div>
            </div>

    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-text card-header-primary">
                <div class="card-text">
                    <h4 class="card-title">Ejercicio</h4>
                    <p class="card-category">Teorico ó Practico </p>
                </div>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <textarea name="contenido" id="example" requerid value="{{$ejercicio->contenido}}" class="wrs_div_box" contenteditable="true" tabindex="0" spellcheck="true" role="textbox" aria-label="Rich Text Editor, example" title="Rich Text Editor, example">
						<?php echo $ejercicio->contenido?>
						</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <button class="btn btn-primary" type="submit">Guardar y cotinuar</button>
                        <button class="btn btn-danger" type="reset">Cancelar</button>
                    </div>
                </div>
                </form>
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
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
</script>
@endsection