@extends ('layouts.admin')

@section ('contenido')
<div class="breadcrumb">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('gestion/contenido')}}">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="{{url('/facultad/profe')}}">Usuarios</a></li>
            <li class="breadcrumb-item active" aria-current="page">Crear</li>
        </ol>
    </nav>
</div>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Usuario</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
            @endif
        </div>
    </div>
    <div class="row">
       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                 <div class="card-header">
                    <h4 class="card-title">Crear  - 
                        <small class="category"> Escuela</small>
                    </h4>
                 </div>
                <div class="card-body">
                {!!Form::open(array('url'=>'facultad/profe','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
                {{Form::token()}}

                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label for="exampleFormControlSelect2">Facultad</label>
                            <select id="faculty" name="id_facultad" class="form-control" data-style="select-with-transition" title="Facultad" data-size="7">
                                <option>Seleccione...</option>
                                @foreach($faculty as $fac)
                                    <option value="{{$fac->id}}">{{$fac->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label for="exampleFormControlSelect2">Escuela</label>
                            <select id="school" name="id_escuela" class="form-control" data-style="select-with-transition" title="Escuela" data-size="7">
                                <option>Seleccione...</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label for="exampleFormControlSelect2">Catedra</label>
                            <select id="cathedra" name="id_catedra" class="form-control" data-style="select-with-transition" title="Escuela" data-size="7">
                                <option>Seleccione...</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <label for="exampleFormControlSelect2">Materia</label>
                            <select id="matter" name="id_materia"  data-style="select-with-transition"  class="form-control" data-style="select-with-transition" title="Escuela" data-size="7">
                                <option>Seleccione...</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" required value = "{{old('nombre')}}" class="form-control" >
                            </div>
                        </div>
                    
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="apellido">Apellido</label>
                                <input type="text" name="apellido"  value = "{{old('apellido')}}" class="form-control">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="cedula">Cedula</label>
                                <input type="text" name="cedula"  value = "{{old('cedula')}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="name">Usuario</label>
                                <input type="text" name="name" required value = "{{old('name')}}" class="form-control" >
                            </div>
                        </div>
                    
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="email">Correo</label>
                                <input type="text" name="email"  value = "{{old('email')}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="exampleFormControlSelect2">Cargo</label>
                            <select name="id_cargo" class="form-control" data-style="select-with-transition" title="Facultad" data-size="7">
                                <option>Seleccione...</option>
                                @foreach($cargo as $car)
                                    <option value="{{$car->id}}">{{$car->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="text" name="password"  value = "{{old('password')}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Guardar</button>
                                <a  href="{{url('/facultad/profe')}}">
                                <button class="btn btn-danger" type="button">Cancelar</button>
                                </a>
                            </div>
                        </div>
                    </div>
                {!!Form::close()!!}
            </div>
         </div>
     </div>
</div>
@endsection
