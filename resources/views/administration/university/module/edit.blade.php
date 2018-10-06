@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Modificar Modulo</h3>
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
                    <h4 class="card-title">Modificar  - 
                        <small class="category">{{$module->nombre}}</small>
                    </h4>
                 </div>
                <div class="card-body">
               <form method="post" action="/facultad/modulo/modificar/{{$module->id}}" >
                 @csrf
              
                 <input type="hidden" value="{{csrf_token()}}" name="_token" /> 
                 
                    <div class="row">                                        
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                 
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" required value ="{{$module->nombre}}" class="form-control" >
                            </div>
                        </div>
                    
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <input type="text" name="descripcion"  value ="{{$module->descripcion}}" class="form-control">
                            </div>
                        </div>
                        <input type="hidden" value="{{$module->id_materia}}" name="id_materia" /> 
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Guardar</button>
                                <button class="btn btn-danger" type="reset">Cancelar</button>
                            </div>
                        </div>
                    </div>
               </form>
            </div>
         </div>
     </div>
</div>

@endsection
