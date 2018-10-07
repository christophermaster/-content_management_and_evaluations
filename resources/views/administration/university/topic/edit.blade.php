@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Modificar Tema</h3>
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
                        <small class="category">{{$topic->nombre}}</small>
                    </h4>
                 </div>
                <div class="card-body">
               <form method="post" action="/facultad/tema/modificar/{{$topic->id}}" >
                 @csrf
              
                 <input type="hidden" value="{{csrf_token()}}" name="_token" /> 
                 
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label for="numero_tema">Nº Tema</label>
                                <input type="number" name="numero_tema"  value ="{{$topic->numero_tema}}" class="form-control">
                            </div>
                        </div> 

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                 
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" required value ="{{$topic->nombre}}" class="form-control" >
                            </div>
                        </div>
                    
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <input type="text" name="descripcion"  value ="{{$topic->descripcion}}" class="form-control">
                            </div>
                        </div>
                        <input type="hidden" value="{{$topic->id_modulo}}" name="id_modulo" /> 
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
