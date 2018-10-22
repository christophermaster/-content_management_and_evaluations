{!! Form::open(array('url' => 'gestion/contenido/resumen/soluciones' , 'method'=> 'Get','autocomplete' =>'off','role' => 'search'))!!}
<div class="row miform">
    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
        <label for="exampleFormControlSelect2" class="milabel">Facultad</label>
        <select id="faculty" name="usuario" class="form-control miInput" data-style="select-with-transition" title="Facultad" data-size="7">
            <option value>Seleccione...</option>
            @foreach($usuario as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
         <label for="exampleFormControlSelect2" class="milabel">Fecha de la evaluación</label>
        <div class="form-group">
            <input type="date" class="form-control miInput" name="fecha_inicial">
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
        <label for="exampleFormControlSelect2" class="milabel">Fecha de la evaluación</label>
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