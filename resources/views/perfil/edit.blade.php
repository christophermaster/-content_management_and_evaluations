@extends ('layouts.admin')
@section ('contenido')


    <div class="breadcrumb">
       <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('gestion/contenido')}}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{url('mi/perfil')}}">Mi perfil</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar perfil</li>
            </ol>
        </nav>
    </div>

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Perfil: {{ $people->nombre}}</h3>
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
    <hr>
    <div class="row">
       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                 <div class="card-header">
                    <h4 class="card-title">Modificar Información  Basica- 
                        <small class="category">{{$people->nombre}}</small>
                    </h4>
                 </div>
                <div class="card-body">
               {!!Form::model($people,['method'=>'PATCH','route'=>['perfil.update',$people->id],'files'=>'true'])!!}
                {{Form::token()}}
                    <div class="row">

                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" required value ="{{$people->nombre}}" class="form-control" >
                            </div>
                        </div>
                    
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="apellido">Apellido</label>
                                <input type="text" name="apellido"  value ="{{$people->apellido}}" class="form-control">
                            </div>
						</div>

						 <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="cedula">Cedula</label>
                                <input type="text" name="cedula"  value ="{{$people->cedula}}" class="form-control">
                            </div>
						</div>

                    </div>
                    <div class="row">

                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="name">Usuario</label>
                                <input type="text" name="name" required value ="{{$user->name}}" class="form-control" disabled>
                            </div>
                        </div>
                    
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email"  value ="{{$user->email}}" class="form-control">
                            </div>
						</div>

						 <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="text" name="password"  value ="" class="form-control">
                            </div>
						</div>

                    </div>
                     <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Sobre mi</label>
                                <div class="form-group">
                                    <textarea class="form-control" rows="5"  name="descripcion">{{$people->descripcion}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" value="{{$user->id}}" name="id_user" /> 
					<div class="row">
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