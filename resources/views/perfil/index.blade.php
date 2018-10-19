@extends('layouts.admin') @section('contenido')
<div class="container-fluid">
    <div class="breadcrumb">
       <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('gestion/contenido')}}">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Mi perfil</li>
            </ol>
        </nav>
    </div>
</div>

@foreach($user as $us)
  <div class="content">
      <div class="container-fluid">
        <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">description</i>
                </div>
                <p class="card-category">Ejercicios</p>
                <h3 class="card-title">84</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">description</i>Ejercicios subidos
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">extension</i>
                </div>
                <p class="card-category">Soluciones</p>
                <h3 class="card-title">14</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">extension</i>Soluciones subidas
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">favorite</i>
                </div>
                <p class="card-category">favorito</p>
                <h3 class="card-title">64</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">favorite</i> Ejer. o Sol. favoritas
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">offline_pin</i>
                </div>
                <p class="card-category">Por Confirmar</p>
                <h3 class="card-title">4</h3>
            </div>

            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">update</i> Ejer. o Sol. por ser Confirmadas
                </div>
            </div>

        </div>
    </div>
</div>
          <div class="row">
              <div class="col-md-4">
                  <div class="card card-profile">
                      <div class="card-avatar">
                          <a href="#pablo">
                              <img class="img" src="{{asset('img/faces/avatar.jpg')}}" />
                          </a>
                      </div>
                      <div class="card-body">
                          <h6 class="card-category text-gray">{{$us->cargo}}</h6>
                          <h4 class="card-title"> {{$us->nombre}}  {{$us->apellido}}</h4>
                          <p class="card-description">
                             {{$us->descripcion}}
                          </p>
                         
                      </div>
                  </div>
              </div>
              <div class="col-md-8">
                  <div class="card">
                      <div class="card-header card-header-icon card-header-primary">
                          <div class="card-icon">
                              <i class="material-icons">perm_identity</i>
                          </div>
                        <div class="card-title titulo">
                            <div class="text-left mystats">
                                <div class="user-info ">
                                    <a data-toggle="collapse" href="#collapseExample" class="username">
                                        <span> <b class="caret"></b></span>
                                    </a>
                                </div>
                            </div>
                            <div class="mystats text-right">
                                <a href ="{{URL::action('MiPerfilController@edit', $us->id)}}">
                                    <button type="button" rel="tooltip" class="btn  btn-link" data-original-title="Editar" title="Editar">
                                    <i class="material-icons">edit</i>
                                    </button>
                                </a>
                            </div>
                        </div>
                      </div>
                      <div class="card-body">
                          <form>
                              <div class="row">
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label class="bmd-label-floating">Nombre</label>
                                          <input type="text" class="form-control" disabled value="{{$us->nombre}}">
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label class="bmd-label-floating">Apellido</label>
                                          <input type="text" class="form-control" disabled value="{{$us->apellido}}">
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label class="bmd-label-floating">Cedula</label>
                                          <input type="email" class="form-control" disabled value="{{$us->cedula}}">
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label class="bmd-label-floating">facultad</label>
                                          <input type="text" class="form-control" disabled value="{{$us->facultad}}">
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label class="bmd-label-floating">Escuela</label>
                                          <input type="text" class="form-control" disabled value="{{$us->escuela}}">
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label class="bmd-label-floating">Catedra</label>
                                          <input type="text" class="form-control" disabled value="{{$us->catedra}}">
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label class="bmd-label-floating">Usuario</label>
                                          <input type="text" class="form-control"  disabled value="{{$us->name}}">
                                      </div>
                                  </div>
                                   <div class="col-md-6">
                                      <div class="form-group">
                                          <label class="bmd-label-floating">Correo</label>
                                          <input type="text" class="form-control"  disabled value="{{$us->email}}">
                                      </div>
                                  </div>
                            
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label>Sobre mi</label>
                                          <div class="form-group">
                                              
                                              <textarea class="form-control" rows="5" disabled >{{$us->descripcion}}</textarea>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                             
                          </form>
                           
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endforeach
@endsection