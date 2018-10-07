@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Materia</h3>
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
                        <small class="category"> Materia</small>
                    </h4>
                 </div>
                <div class="card-body">
                {!!Form::open(array('url'=>'facultad/tema','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
                {{Form::token()}}
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label for="numero_tema">Nº Tema</label>
                                <input type="number" name="numero_tema" required value = "{{old('numero_tema')}}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" required value = "{{old('nombre')}}" class="form-control" >
                            </div>
                        </div>
                    
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <input type="text" name="descripcion"  value = "{{old('descripcion')}}" class="form-control">
                            </div>
                        </div>
                        <input type="hidden" name="id_modulo"  value = "{{$id_modulo}}" class="form-control">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Guardar</button>
                                <button class="btn btn-danger" type="reset">Cancelar</button>
                            </div>
                        </div>
                    </div>
                {!!Form::close()!!}
            </div>
         </div>
     </div>
</div>
@endsection
