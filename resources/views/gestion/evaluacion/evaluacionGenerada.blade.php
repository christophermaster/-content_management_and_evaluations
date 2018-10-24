@extends('layouts.admin') @section('contenido')

<div class="container-fluid">
    <!--
        Manejador de Errores 
    -->
    <a href="{{url('http://www.wiris.com/plugins/demo/ckeditor/php')}}" title="PHP">
        <input type="hidden" id="php_logo" class="wrs_tech_logo" alt="PHP"></a>
    @if (count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @else
        @include('flash::message')
    @endif

<!---->

    <!--
        FORMULARIO PARTA LA META DATA DEL EJERCICIO 

    -->
    <div class="row">
        <div class="col-md-12 text-center">
            <h2>Evaluacion Generada</h2>
            <hr>
        </div>
    </div>
    <div class="row">


    <div class="col-md-12">
        <div class="">
            <div class="card-body">
                {!!Form::open(array('url'=>'solucion/save','method'=>'POST','autocomplete'=>'off'))!!} {{Form::token()}}
                    <div class="tab-content tab-space tab-subcategories">
                        <div class="tab-pane active" id="link7">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="contenido" id="example" requerid value="{{old('contenido')}}" class="wrs_div_box" contenteditable="true" tabindex="0" spellcheck="true" role="textbox" 
                                    aria-label="Rich Text Editor, example" title="Rich Text Editor, example" required>
                                    <table style="width:100%;">
	<tbody>
		<tr>
			<td><span lang="ES" style="font-size:10.5pt"><span style="line-height:115%"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">UNIVERSIDAD DE CARABOBO</span></span></span></td>
			<td><b><span lang="ES" style="font-size:10.5pt"><span style="line-height:115%"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">Preparador:</span></span></span></b> {{$persona->nombre}} {{$persona->apellido}}</td>
		</tr>
		<tr>
			<td><span lang="ES" style="font-size:10.5pt"><span style="line-height:115%"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">FACULTAD EXPERIMENTAL DE CIENCIA Y TECNOLOGIA</span></span></span></td>
			<td><span lang="ES" style="font-size:10.5pt"><span style="line-height:115%"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">{{$temporaryEvaluation->fecha}}</span></span></span></td>
		</tr>
		<tr>
			<td><span lang="ES" style="font-size:10.5pt"><span style="line-height:115%"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">DEPARTAMENTO DE COMPUTACI&Oacute;N</span></span></span></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td><span lang="ES" style="font-size:10.5pt"><span style="line-height:115%"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">ELEMENTOS DISCRETOS</span></span></span></td>
			<td>&nbsp;</td>
		</tr>
	</tbody>
</table>

<p style="text-align: center;"><strong>{{$temporaryEvaluation->nombre_tipo_evaluacion}} de {{$temporaryEvaluation->tema}}</strong></p>

<p>&nbsp;</p>

<p><strong>Nombre:________________ CI: ________________ Sec:___</strong></p>

@foreach($ejercicioTeorico as $ejerT)
<p>{{$ejerT->contenido}}</p>
@endforeach

@foreach($ejercicioPractico as $ejerT)
<p>{{$ejerT->contenido}}</p>
@endforeach


                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
              <input type="hidden" value="" name ="id_ejercicio">
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