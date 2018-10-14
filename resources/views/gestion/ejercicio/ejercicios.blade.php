@extends('layouts.admin') @section('contenido')

<!--
    FILTRAR LOS EJERCICIOS 
-->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div id="accordion" role="tablist">
                    <div class="card-collapse">
                        <!--
                            ENCABEZADO
                        -->
                        <div class="card-header" role="tab" id="headingTwo">
                            <h5 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Filtrar
                                    <i class="material-icons">import_export</i>
                                </a>
                            </h5>
                        </div>
                        <!--
                            BODY
                        -->
                        <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select class="selectpicker" data-size="7" data-style="select-with-transition" title="Materia">
                                                <option value="Afghanistan"> Elementos discreto I </option>
                                                <option value="Albania"> Elementos discreto II </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select class="selectpicker" data-size="7" data-style="select-with-transition" title="Tema">
                                                <option value="Afghanistan"> Logica </option>
                                                <option value="Albania"> Conjuntos </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select class="selectpicker" data-size="7" data-style="select-with-transition" title="Sub Tema">
                                                <option value="Afghanistan"> Simplificación </option>
                                                <option value="Albania"> Simbolización </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select class="selectpicker" data-size="7" data-style="select-with-transition" title="Dificultad">
                                                <option value="Afghanistan"> Facíl </option>
                                                <option value="Albania"> Intermedio </option>
                                                <option value="Afghanistan"> Dificil </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--
    PANEL QUE MUESTRA LA CANTIDAD DE EJERCICIOS Y SOLUCIONES  SUBIDOS  
-->
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
<!--
tITULO 
-->
<div class="row">
    <h4>Lista de Ejercicios</h4>
</div>
<hr>
<!--
    CARDS DE LOS EJERCICIOS 
-->
<div class="row">
    @foreach($ejercicio as $eje)
        <div class="col-md-6">
            <div class="card ">
                <div class="card-header ">
                    <h4 class="card-title">Elementos I -
                        <small class="description">Simbolización</small>
                    </h4>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <!--
                                color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
                                -->
                            <ul class="nav nav-pills nav-pills-info nav-pills-icons flex-column" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#link1{{$eje->esID}}" role="tablist">
                                        <i class="material-icons">description</i> Ejercicio
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#link2{{$eje->esID}}" role="tablist">
                                        <i class="material-icons">extension</i> Solución
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#link3{{$eje->esID}}" role="tablist">
                                        <i class="material-icons">art_track</i> Detalle
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-8">
                            <div class="tab-content">
                                <div class="tab-pane active class_div" id="link1{{$eje->esID}}">
                                  <?php echo $eje->contenido; ?>
                                </div>
                                <div class="tab-pane class_div" id="link2{{$eje->esID}}">
                                     <?php echo $eje->contSol; ?>
                                </div>
                                <div class="tab-pane class_div" id="link3{{$eje->esID}}">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     @endforeach
</div>

@endsection