{!! Form::open(array('url' => 'gestion/contenido/mis/publicaciones/ejercicios' , 'method'=> 'Get','autocomplete' =>'off','role' => 'search'))!!}
<div class="row miform">
<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
    <label for="exampleFormControlSelect2" class="milabel">Facultad</label>
    <select id="faculty" name="facultad" class="form-control miInput" data-style="select-with-transition" title="Facultad" data-size="7">
        <option value>Seleccione...</option>
        @foreach($faculty as $fac)
            <option value="{{$fac->id}}">{{$fac->nombre}}</option>
        @endforeach
    </select>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
    <label for="exampleFormControlSelect2" class="milabel">Escuela</label>
    <select id="school" name="escuela" class="form-control miInput" data-style="select-with-transition" title="Escuela" data-size="7">
        <option value>Seleccione...</option>
    </select>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
    <label for="exampleFormControlSelect2" class="milabel">Catedra</label>
    <select id="cathedra" name="catedra" class="form-control miInput" data-style="select-with-transition" title="Escuela" data-size="7">
        <option value>Seleccione...</option>
    </select>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
    <label for="exampleFormControlSelect2" class="milabel">Materia</label>
    <select id="matter" name="materia"  data-style="select-with-transition"  class="form-control miInput" data-style="select-with-transition" title="Escuela" data-size="7">
        <option value>Seleccione...</option>
    </select>
</div>
</div>
<div class="row miform">
<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
    <label for="exampleFormControlSelect2" class="milabel">Tema</label>
    <select id="topic" name="tema" class="form-control miInput" data-style="select-with-transition" title="Facultad" data-size="7">
        <option value>Seleccione...</option>
    </select>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
    <label for="exampleFormControlSelect2" class="milabel">Contenido</label>
    <select id="content" name="contenido" class="form-control miInput" data-style="select-with-transition" title="Escuela" data-size="7">
        <option value>Seleccione...</option>
    </select>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
    <label for="exampleFormControlSelect2" class="milabel">Tipo Ejercicio</label>
    <select id="cathdra" name="tipo" class="form-control miInput" data-style="select-with-transition" title="Escuela" data-size="7">
        <option value>Seleccione...</option>
        @foreach($tipo_ejercicio as $type)
            <option value="{{$type->id}}">{{$type->nombre}}</option>
        @endforeach
    </select>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
    <label for="exampleFormControlSelect2" class="milabel">Dificultad</label>
    <select id="dificultad" name="dificultad"  data-style="select-with-transition"  class="form-control miInput" data-style="select-with-transition" title="Escuela" data-size="7">
        <option value>Seleccione...</option>
        @foreach($dificultad as $dif)
            <option value="{{$dif->id}}">{{$dif->nombre}}</option>
        @endforeach
    </select>
</div>
</div>
<div class="row miform">
    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
        <label for="exampleFormControlSelect2" class="milabel">Usuario</label>
        <select id="faculty" name="usuario" class="form-control miInput" data-style="select-with-transition" title="Facultad" data-size="7">
            <option value>Seleccione...</option>
            @foreach($usuario as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
    </div>
<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
         <label for="exampleFormControlSelect2" class="milabel">Fecha Inicio</label>
        <div class="form-group">
            <input type="date" class="form-control miInput" name="fecha_inicial">
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
        <label for="exampleFormControlSelect2" class="milabel">Fecha Final</label>
        <div class="form-group">
            <input type="date" class="form-control miInput" name="fecha_final">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
        <button type="submit" class="btn btn-primary btn-just-icon">
                <i class="material-icons">filter_list</i>
                <div class="ripple-container"></div>
        </button>
    </div>
</div>


{{Form::close()}}