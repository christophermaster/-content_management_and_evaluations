@extends('layouts.admin') @section('contenido')

<!--
    FILTRAR LOS EJERCICIOS 
-->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
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
    <div class="col-lg-6 col-md-6 col-sm-6">
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
    <div class="col-lg-6 col-md-6 col-sm-6">
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
    <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="card ">
            <div class="card-header ">
                <div class="card-title titulo">
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
            </div>

            <div class="card-body ">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <!--
                              color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
                            -->
                        <ul class="nav nav-pills nav-pills-info nav-pills-icons flex-column" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#link110" role="tablist">
                                    <i class="material-icons">description</i> Ejercicio
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#link111" role="tablist">
                                    <i class="material-icons">extension</i> Solución
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#link112" role="tablist">
                                    <i class="material-icons">art_track</i> Detalle
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content">
                            <div class="tab-pane active class_div" id="link110">

                                <p>In elementary algebra, the <b>quadratic formula</b> is the solution of the quadratic equation.</p>
                                <p style="text-align: center;"><math xmlns="{{url('http://www.w3.org/1998/Math/MathML')}}"><mi>x</mi><mo>=</mo><mfrac><mrow><mo>-</mo><mi>b</mi><mo>&#x000B1;</mo><msqrt><msup><mi>b</mi><mn>2</mn></msup><mo>-</mo><mn>4</mn><mi>a</mi><mi>c</mi></msqrt></mrow><mrow><mn>2</mn><mi>a</mi></mrow></mfrac></math></p>
                                <p><b>Water is made from two molecules</b> - Hydrogen and Oxygen. If you put the two gasses together, along with energy, you can make water.</p>
                                <p style="text-align: center;"><math class="wrs_chemistry" xmlns="{{url('http://www.w3.org/1998/Math/MathML')}}"><msub><mi mathvariant="normal">H</mi><mn>2</mn></msub><mfenced><mi mathvariant="normal">g</mi></mfenced><mo>+</mo><msub><mi mathvariant="normal">O</mi><mn>2</mn></msub><mfenced><mi mathvariant="normal">g</mi></mfenced><mo>&#x21CC;</mo><mn>2</mn><msub><mi mathvariant="normal">H</mi><mn>2</mn></msub><mi mathvariant="normal">O</mi><mfenced><mi mathvariant="normal">l</mi></mfenced></math></p>
                                <br>
                                <p>The entire formula for the surface area of a cylinder is <math xmlns="{{url('http://www.w3.org/1998/Math/MathML')}}"><mn>2</mn><msup><mi>&#x3C0;r</mi><mn>2</mn></msup><mo>+</mo><mn>2</mn><mi>&#x3C0;rh</mi></math></p>

                            </div>
                            <div class="tab-pane class_div" id="link111">
                                <p>In elementary algebra, the <b>quadratic formula</b> is the solution of the quadratic equation.</p>
                                <p style="text-align: center;"><math xmlns="{{url('http://www.w3.org/1998/Math/MathML')}}"><mi>x</mi><mo>=</mo><mfrac><mrow><mo>-</mo><mi>b</mi><mo>&#x000B1;</mo><msqrt><msup><mi>b</mi><mn>2</mn></msup><mo>-</mo><mn>4</mn><mi>a</mi><mi>c</mi></msqrt></mrow><mrow><mn>2</mn><mi>a</mi></mrow></mfrac></math></p>
                                <p><b>Water is made from two molecules</b> - Hydrogen and Oxygen. If you put the two gasses together, along with energy, you can make water.</p>
                                <p style="text-align: center;"><math class="wrs_chemistry" xmlns="{{url('http://www.w3.org/1998/Math/MathML')}}"><msub><mi mathvariant="normal">H</mi><mn>2</mn></msub><mfenced><mi mathvariant="normal">g</mi></mfenced><mo>+</mo><msub><mi mathvariant="normal">O</mi><mn>2</mn></msub><mfenced><mi mathvariant="normal">g</mi></mfenced><mo>&#x21CC;</mo><mn>2</mn><msub><mi mathvariant="normal">H</mi><mn>2</mn></msub><mi mathvariant="normal">O</mi><mfenced><mi mathvariant="normal">l</mi></mfenced></math></p>
                                <br>
                                <p>The entire formula for the surface area of a cylinder is <math xmlns="{{url('http://www.w3.org/1998/Math/MathML')}}"><mn>2</mn><msup><mi>&#x3C0;r</mi><mn>2</mn></msup><mo>+</mo><mn>2</mn><mi>&#x3C0;rh</mi></math></p>
                            </div>
                            <div class="tab-pane class_div" id="link112">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card ">
            <div class="card-header ">
                <div class="card-title titulo">
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
            </div>
            <div class="card-body ">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <!--
                                  color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
                                -->
                        <ul class="nav nav-pills nav-pills-info nav-pills-icons flex-column" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#link110" role="tablist">
                                    <i class="material-icons">description</i> Ejercicio
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#link111" role="tablist">
                                    <i class="material-icons">extension</i> Solución
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#link112" role="tablist">
                                    <i class="material-icons">art_track</i> Detalle
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content">
                            <div class="tab-pane active class_div" id="link110">

                                <p>In elementary algebra, the <b>quadratic formula</b> is the solution of the quadratic equation.
                                </p>
                                <p style="text-align: center;"><math xmlns="{{url('http://www.w3.org/1998/Math/MathML')}}">
                                        <mi>x</mi>
                                        <mo>=</mo>
                                        <mfrac>
                                            <mrow>
                                                <mo>-</mo>
                                                <mi>b</mi>
                                                <mo>&#x000B1;</mo>
                                                <msqrt>
                                                    <msup>
                                                        <mi>b</mi>
                                                        <mn>2</mn>
                                                    </msup>
                                                    <mo>-</mo>
                                                    <mn>4</mn>
                                                    <mi>a</mi>
                                                    <mi>c</mi>
                                                </msqrt>
                                            </mrow>
                                            <mrow>
                                                <mn>2</mn>
                                                <mi>a</mi>
                                            </mrow>
                                        </mfrac>
                                    </math></p>
                                <p><b>Water is made from two molecules</b> - Hydrogen and Oxygen. If you put the two gasses together, along with energy, you can make water.</p>
                                <p style="text-align: center;"><math class="wrs_chemistry" xmlns="{{url('http://www.w3.org/1998/Math/MathML')}}">
                                        <msub>
                                            <mi mathvariant="normal">H</mi>
                                            <mn>2</mn>
                                        </msub>
                                        <mfenced>
                                            <mi mathvariant="normal">g</mi>
                                        </mfenced>
                                        <mo>+</mo>
                                        <msub>
                                            <mi mathvariant="normal">O</mi>
                                            <mn>2</mn>
                                        </msub>
                                        <mfenced>
                                            <mi mathvariant="normal">g</mi>
                                        </mfenced>
                                        <mo>&#x21CC;</mo>
                                        <mn>2</mn>
                                        <msub>
                                            <mi mathvariant="normal">H</mi>
                                            <mn>2</mn>
                                        </msub>
                                        <mi mathvariant="normal">O</mi>
                                        <mfenced>
                                            <mi mathvariant="normal">l</mi>
                                        </mfenced>
                                    </math></p>
                                <br>
                                <p>The entire formula for the surface area of a cylinder is <math xmlns="{{url('http://www.w3.org/1998/Math/MathML')}}">
                                        <mn>2</mn>
                                        <msup>
                                            <mi>&#x3C0;r</mi>
                                            <mn>2</mn>
                                        </msup>
                                        <mo>+</mo>
                                        <mn>2</mn>
                                        <mi>&#x3C0;rh</mi>
                                    </math></p>

                            </div>
                            <div class="tab-pane class_div" id="link111">
                                <p>In elementary algebra, the <b>quadratic formula</b> is the solution of the quadratic equation.
                                </p>
                                <p style="text-align: center;"><math xmlns="{{url('http://www.w3.org/1998/Math/MathML')}}">
                                        <mi>x</mi>
                                        <mo>=</mo>
                                        <mfrac>
                                            <mrow>
                                                <mo>-</mo>
                                                <mi>b</mi>
                                                <mo>&#x000B1;</mo>
                                                <msqrt>
                                                    <msup>
                                                        <mi>b</mi>
                                                        <mn>2</mn>
                                                    </msup>
                                                    <mo>-</mo>
                                                    <mn>4</mn>
                                                    <mi>a</mi>
                                                    <mi>c</mi>
                                                </msqrt>
                                            </mrow>
                                            <mrow>
                                                <mn>2</mn>
                                                <mi>a</mi>
                                            </mrow>
                                        </mfrac>
                                    </math></p>
                                <p><b>Water is made from two molecules</b> - Hydrogen and Oxygen. If you put the two gasses together, along with energy, you can make water.</p>
                                <p style="text-align: center;"><math class="wrs_chemistry" xmlns="{{url('http://www.w3.org/1998/Math/MathML')}}">
                                        <msub>
                                            <mi mathvariant="normal">H</mi>
                                            <mn>2</mn>
                                        </msub>
                                        <mfenced>
                                            <mi mathvariant="normal">g</mi>
                                        </mfenced>
                                        <mo>+</mo>
                                        <msub>
                                            <mi mathvariant="normal">O</mi>
                                            <mn>2</mn>
                                        </msub>
                                        <mfenced>
                                            <mi mathvariant="normal">g</mi>
                                        </mfenced>
                                        <mo>&#x21CC;</mo>
                                        <mn>2</mn>
                                        <msub>
                                            <mi mathvariant="normal">H</mi>
                                            <mn>2</mn>
                                        </msub>
                                        <mi mathvariant="normal">O</mi>
                                        <mfenced>
                                            <mi mathvariant="normal">l</mi>
                                        </mfenced>
                                    </math></p>
                                <br>
                                <p>The entire formula for the surface area of a cylinder is <math xmlns="{{url('http://www.w3.org/1998/Math/MathML')}}">
                                        <mn>2</mn>
                                        <msup>
                                            <mi>&#x3C0;r</mi>
                                            <mn>2</mn>
                                        </msup>
                                        <mo>+</mo>
                                        <mn>2</mn>
                                        <mi>&#x3C0;rh</mi>
                                    </math></p>
                            </div>
                            <div class="tab-pane class_div" id="link112">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection