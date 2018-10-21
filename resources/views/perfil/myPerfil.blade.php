@extends('layouts.admin') @section('contenido')
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
                <h3 class="card-title">{{$cantEjercicio->cantidad}}</h3>
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
                <h3 class="card-title">{{$cantSoluciones->cantidad}}</h3>
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
                          <h6 class="card-category text-gray">CEO / Co-Founder</h6>
                          <h4 class="card-title">Christopher Siverio</h4>
                          <p class="card-description">
                             No tengas miedo de la verdad porque necesitamos reiniciar la base humana en la verdad
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
                          <h4 class="card-title">Mi PERFIL - 
                              <small class="category"> Informacion Personal</small>
                          </h4>
                      </div>
                      <div class="card-body">
                          <form>
                              <div class="row">
                                  <div class="col-md-5">
                                      <div class="form-group">
                                          <label class="bmd-label-floating">Empresa (disabled)</label>
                                          <input type="text" class="form-control" disabled>
                                      </div>
                                  </div>
                                  <div class="col-md-3">
                                      <div class="form-group">
                                          <label class="bmd-label-floating">Nombre de Usuario</label>
                                          <input type="text" class="form-control">
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label class="bmd-label-floating">Email</label>
                                          <input type="email" class="form-control">
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label class="bmd-label-floating">Nombre</label>
                                          <input type="text" class="form-control">
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label class="bmd-label-floating">Apellido</label>
                                          <input type="text" class="form-control">
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label class="bmd-label-floating">Adress</label>
                                          <input type="text" class="form-control">
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label class="bmd-label-floating">Ciudad</label>
                                          <input type="text" class="form-control">
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label class="bmd-label-floating">Pais</label>
                                          <input type="text" class="form-control">
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label class="bmd-label-floating">Número de Telf:</label>
                                          <input type="text" class="form-control">
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label>Sobre mi</label>
                                          <div class="form-group">
                                              <label class="bmd-label-floating">Descripción.</label>
                                              <textarea class="form-control" rows="5"></textarea>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <button type="submit" class="btn btn-primary pull-right">Actualizar perfil</button>
                              <div class="clearfix"></div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection