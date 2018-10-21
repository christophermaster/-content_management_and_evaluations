@extends('layouts.admin') @section('contenido')
<!--
<div class = "row">
    <div class= "col-lg-8 col-md-8 col-sm-8 col-xl-8 ">

        @foreach($contenido as $con)
        <div class="card card-product">
            <div class="card-header card-header-success card-header-icon">

                    <div class="card-icon logo"> CT </div>
                <div class = "row titulo">    
                    <div class="text-left mystats">
                       
                        <div class="photo">
                          <img src="{{asset('img/faces/avatar.jpg')}}" />
                        </div>

                        <div class="user-info ">
                            <a data-toggle="collapse" href="#collapseExample" class="username">
                                <span>Naileth Galindez <b class="caret"></b></span>
                            </a>
                        </div>
                
                    </div>

                    <div class="mystats text-right">

                        <a class="nav-item menu" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons munu">more_vert</i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#"><i class="material-icons">art_track</i> Detalles</a>
                            <a class="dropdown-item" href="#"><i class="material-icons">edit</i> Modificar</a>
                            <a class="dropdown-item" href="#"><i class="material-icons">close</i> Eliminar</a>
                           </div>

                    </div>   
                </div>

                <hr>     
                
            </div>
            
            <div class="card-body">      
                <?php echo $con->contenido; ?>      
            </div>

            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons" >
                         drag_handle
                    </i>
                    <i class="material-icons">
                         menu
                    </i>
                    <i class="material-icons">
                        format_align_justify
                    </i>
                </div>
                <div class="stats">
                    <i class="material-icons">
                        favorite_border
                    </i>
                </div>
   
                <div class="stats">
                    
                    <i class="material-icons">
                    description
                    </i>
                    <span> 20 veces Usado</span>
                </div>
                 
            </div>
        </div>
        @endforeach
       
    </div>

    <div class= "col-lg-4 col-md-4 col-sm-4 col-xl-4" >

        <ul class="timeline timeline-simple">
            <li class="timeline-inverted">
            <div class="timeline-badge danger">
                <i class="material-icons">chrome_reader_mode</i>
            </div>
            <div class="timeline-panel">
                <div class="timeline-heading">
                <span class="badge badge-pill badge-danger">Categoría</span>
                </div>
                <div class="timeline-body">
                    <div class="table-full-width table-responsive">
                            <table class="table">
                                    <tbody>
                                      <tr>
                                        <td class="img-row">
                                          <div class="photo">
                                            <img src="{{asset('img/faces/ayo-ogunseinde-2.jpg')}}" class="img-raised">
                                          </div>
                                        </td>
                                        <td class="text-left">Elementos I</td>
                                        <td class="td-actions text-right">
                                          <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                                                <i class="material-icons">
                                                        visibility
                                                        </i>
                                          </button>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td class="img-row">
                                          <div class="photo">
                                            <img src="{{asset('img/faces/erik-lucatero-2.jpg')}}" class="img-raised">
                                          </div>
                                        </td>
                                        <td class="text-left">Elemetos II</td>
                                        <td class="td-actions text-right">
                                          <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                                                <i class="material-icons">
                                                        visibility
                                                        </i>
                                          </button>
                                        </td>
                                      </tr>
                        
                                    </tbody>
                                  </table>

                    </div>
                
                </div>
                <h6>
                <i class="ti-time"></i> Matematica Discreta
                </h6>
            </div>
            </li>
            <li class="timeline-inverted">
            <div class="timeline-badge success">
                <i class="material-icons">account_circle</i>
            </div>
            <div class="timeline-panel">
                <div class="timeline-heading">
                <span class="badge badge-pill badge-success">Profesores Y Preparadores</span>
                </div>
                <div class="timeline-body">
                        <div class="table-full-width table-responsive">
                                <table class="table">
                                        <tbody>
                                          <tr>
                                            <td class="img-row">
                                              <div class="photo">
                                                <img src="{{asset('img/faces/ayo-ogunseinde-2.jpg')}}" class="img-raised">
                                              </div>
                                            </td>
                                            <td class="text-left">Chriss</td>
                                            <td class="td-actions text-right">
                                              <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                                                    <i class="material-icons">
                                                            visibility
                                                            </i>
                                              </button>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td class="img-row">
                                              <div class="photo">
                                                <img src="{{asset('img/faces/erik-lucatero-2.jpg')}}" class="img-raised">
                                              </div>
                                            </td>
                                            <td class="text-left">Nai</td>
                                            <td class="td-actions text-right">
                                              <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                                                    <i class="material-icons">
                                                            visibility
                                                            </i>
                                              </button>
                                            </td>
                                          </tr>
                            
                                        </tbody>
                                      </table>
                                    </div>
            </div>
            </li>
            <li class="timeline-inverted">
            <div class="timeline-badge info">
                <i class="material-icons">fingerprint</i>
            </div>
            <div class="timeline-panel">
                <div class="timeline-heading">
                <span class="badge badge-pill badge-info">Another Title</span>
                </div>
                <div class="timeline-body">
                <p>Called I Miss the Old Kanye That’s all it was Kanye And I love you like Kanye loves Kanye Famous Vering @ Figueroa and 12th in downtown LA 11:10PM</p>
                <p>What if Kanye made a song about Kanye Royère doesn't make a Polar bear bed but the Polar bear couch is my favorite piece of furniture we own It wasn’t any Kanyes Set on his goals Kanye</p>
                <hr>
                <div class="dropdown pull-left">
                    <button type="button" class="btn btn-round btn-info dropdown-toggle" data-toggle="dropdown">
                    <i class="material-icons">build</i>
                    <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                    <li>
                        <a href="#action">Action</a>
                    </li>
                    <li>
                        <a href="#action">Another action</a>
                    </li>
                    <li>
                        <a href="#here">Something else here</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#link">Separated link</a>
                    </li>
                    </ul>
                </div>
                </div>
            </div>
            </li>
        </ul>
        
        
                
    </div>
    {{$contenido ->render()}}
</div>
-->
<div class="row">

    <div class="col-md-12 text-center">
        <h1>RECURSOS EN LINEAS</h1>
        <hr>
    </div>
    <div class="col-md-12 text-center">
        <p>
            El repositorio de la Facultad de Ciencias y Tecnologías albergan Ejercicios,Soluciones, bibliografía, y materiales digitalizados, subidos y creador por los miembros de la comunidad UC-FACYT y las facultades adscritas a la Universidad de carabobo.
        </p>
    </div>
    <br>

    <div class="col-md-12 text-center ">
        <h3><b>Repositorio de la Facultad de Ciencias y Tecnologías</b></h3>
        <br><br><br>
    </div>


    <div class="row">
        <div class="col-md-4">
            <div class="card card-product">
                <div class="card-header card-header-image" data-header-animation="true">
                    <a href="#pablo">
                        <img class="img" src="{{asset('img/card-2.jpg')}}" width="400" height="300">
                    </a>
                </div>
                <div class="card-body">
                    <div class="card-actions text-center">

                        <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="View">
                            <i class="material-icons">art_track</i>
                        </button>

                    </div>
                    <h4 class="card-title">
                        <a href="{{route('materialDigitalizado')}}"><b>Repositorio de material digitalizado</b></a>
                    </h4>
                    <div class="card-description">
                        Reúne los contenidos digitales producidos por la comunidad universitaria resultantes de su actividad docente, investigadora e institucional.
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-product">
                <div class="card-header card-header-image" data-header-animation="true">
                    <a  href="{{route('materialDigitalizado')}}">
                        <img class="img" src="{{asset('img/card-3.jpg')}}" width="400" height="300">
                    </a>
                </div>
                <div class="card-body">
                    <div class="card-actions text-center">

                        <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="View">
                            <i class="material-icons">art_track</i>
                        </button>

                    </div>
                    <h4 class="card-title">
                        <a href="{{route('repositorioEjerSol')}}"><b>Repositorio de Ejercicios y Soluciones</b></a>
                    </h4>
                    <div class="card-description">
                        Reúne los ejercicios y su soluciones producidas por la comunidad docente de la institución universitaria de la Facyt.
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-product">
                <div class="card-header card-header-image" data-header-animation="true">
                    <a href="#pablo">
                        <img class="img" src="{{asset('img/card-1.jpg')}}" width="400" height="300">
                    </a>
                </div>
                <div class="card-body">
                    <div class="card-actions text-center">

                        <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="View">
                            <i class="material-icons">art_track</i>
                        </button>

                    </div>
                    <h4 class="card-title">
                        <a href="#pablo"><b>Repositorio de Evaluaciones</b></a>
                    </h4>
                    <div class="card-description">
                        Reúne las evaluaciones producidas por la comunidad docente de la institución universitaria de la Facyt.
                    </div>
                </div>

            </div>
        </div>


    </div>



</div>


@endsection