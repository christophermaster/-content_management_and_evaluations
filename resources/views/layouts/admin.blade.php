<!DOCTYPE html>
<html lang="es">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>

    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>
        Gestion De Contenido
    </title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="{{url('https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons')}}" />

    <!-- CSS Files -->
    <link href="{{asset('css/material-dashboard.min40a0.css?v=2.0.2')}}" rel="stylesheet" />
    <link href="{{asset('css/myStyle.css')}}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('demo/demo.css')}}" rel="stylesheet" />

    <!-- Editor Plugin -->
    <link type="text/css" rel="stylesheet" href="{{asset('ckeditor4/ckeditor.js')}}" />

    <script type="text/javascript" src="{{url('https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/codemirror.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/xml.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('ckeditor4/plugins/ckeditor_wiris/integration/WIRISplugins.js')}}"></script>

    <script>
        if (window.location.search !== '') {
            var urlParams = window.location.search.split('&')[1].split('=');
            if (urlParams[0] === 'language' && urlParams[1].length >= 2) {
                _wrs_int_langCode = urlParams[1];
            }
        }
    </script>

    <script type="text/javascript" src="{{asset('ckeditor4/ckeditor.js')}}"></script>

    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                '../../../www.googletagmanager.com/gtm5445.html?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-NKDMSK6');
    </script>
   




</head>

<body class="sidebar-mini">

    <div class="wrapper">

        <div class="sidebar" data-color="azure" data-background-color="black" data-image="{{asset('img/nav.gif')}}">

            <div class="logo"><a href="" class="simple-text logo-mini">
                    GC
                </a>

                <a href="" class="simple-text logo-normal">
                   Cestión
                </a></div>

            <div class="sidebar-wrapper">

                <div class="user">
                    <div class="photo">
                        <img src="{{asset('img/faces/avatar.jpg')}}" />
                    </div>
                    <div class="user-info">
                        <a data-toggle="collapse" href="#collapseExample" class="username">
                            <span>
                                Christopher Siverio
                                <b class="caret"></b>
                            </span>
                        </a>
                        <div class="collapse" id="collapseExample">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('miperfil')}}">
                                        <span class="sidebar-mini"> MP </span>
                                        <span class="sidebar-normal"> Mi Perfil </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <span class="sidebar-mini"> CS </span>
                                        <span class="sidebar-normal"> Conf. de Seguridad </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="nav">
                    <!--
                        Inicio
                    -->
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('gestion/contenido')}}">
                            <i class="material-icons">dashboard</i>
                            <p> Inicio </p>
                        </a>
                    </li>
                    <!--
                        GESTION DE EJERCICIO
                    -->

                    <li class="nav-item ">
                        <a class="nav-link" data-toggle="collapse" href="#pagesExamples">
                            <i class="material-icons">image</i>
                            <p>Gestion Ejercicios
                                <b class="caret"></b>
                            </p>
                        </a>
                    <!--
                        lISTA DE EJERCICIO
                    -->
                        <div class="collapse" id="pagesExamples">
                            <ul class="nav">

                                <li class="nav-item ">
                                    <a class="nav-link" data-toggle="collapse" href="#ejercicios">
                                        <span class="sidebar-mini"> E </span>
                                        <span class="sidebar-normal">Ejercicios
                                            <b class="caret"></b>
                                        </span>

                                    </a>

                                    <div class="collapse" id="ejercicios">
                                        <ul class="nav">
                                            <li class="nav-item ">
                                                <a class="nav-link" href="{{url('mis/ejercicios')}}">
                                                    <span class="sidebar-mini"> ME </span>
                                                    <span class="sidebar-normal"> Mis Ejercicios </span>
                                                </a>
                                            </li>
                                            <li class="nav-item ">
                                                <a class="nav-link" href="{{url('otros/ejercicios')}}">
                                                    <span class="sidebar-mini"> TE </span>
                                                    <span class="sidebar-normal"> Todos Los Ejercicios </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('gestion/contenido/create')}}">
                                        <span class="sidebar-mini"> CE </span>
                                        <span class="sidebar-normal">Crear Ejercicio</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('gestion/solucion')}}">
                                        <span class="sidebar-mini"> CS </span>
                                        <span class="sidebar-normal"> Crear Solución </span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="pages/login.html">
                                        <span class="sidebar-mini"> SE </span>
                                        <span class="sidebar-normal"> Subir Ejercicio </span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <!--
                        GESTION DE EVALUACION 
                    -->

                    <li class="nav-item ">
                        <a class="nav-link" data-toggle="collapse" href="#evaluaciones">
                            <i class="material-icons">apps</i>
                            <p> Gestion de Evaluación
                                <b class="caret"></b>
                            </p>
                        </a>

                        <div class="collapse" id="evaluaciones">
                            <ul class="nav">
                                <li class="nav-item ">
                                    <a class="nav-link" data-toggle="collapse" href="#misevaluaciones">
                                        <span class="sidebar-mini"> MI </span>
                                        <span class="sidebar-normal"> Mis Evaluaciones
                                            <b class="caret"></b>
                                        </span>

                                    </a>

                                    <div class="collapse" id="misevaluaciones">
                                        <ul class="nav">
                                            <li class="nav-item ">
                                                <a class="nav-link" href="#0">
                                                    <span class="sidebar-mini"> P </span>
                                                    <span class="sidebar-normal"> Parciales </span>
                                                </a>
                                            </li>
                                            <li class="nav-item ">
                                                <a class="nav-link" href="#0">
                                                    <span class="sidebar-mini"> Q </span>
                                                    <span class="sidebar-normal"> Quices </span>
                                                </a>
                                            </li>
                                            <li class="nav-item ">
                                                <a class="nav-link" href="#0">
                                                    <span class="sidebar-mini"> T </span>
                                                    <span class="sidebar-normal"> Tareas </span>
                                                </a>
                                            </li>
                                            <li class="nav-item ">
                                                <a class="nav-link" href="#0">
                                                    <span class="sidebar-mini"> O </span>
                                                    <span class="sidebar-normal"> Otros </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" data-toggle="collapse" href="#todasevaluaciones">
                                        <span class="sidebar-mini"> MI </span>
                                        <span class="sidebar-normal"> Todas Las Evaluaciones
                                            <b class="caret"></b>
                                        </span>

                                    </a>

                                    <div class="collapse" id="todasevaluaciones">
                                        <ul class="nav">
                                            <li class="nav-item ">
                                                <a class="nav-link" href="#0">
                                                    <span class="sidebar-mini"> P </span>
                                                    <span class="sidebar-normal"> Parciales </span>
                                                </a>
                                            </li>
                                            <li class="nav-item ">
                                                <a class="nav-link" href="#0">
                                                    <span class="sidebar-mini"> Q </span>
                                                    <span class="sidebar-normal"> Quices </span>
                                                </a>
                                            </li>
                                            <li class="nav-item ">
                                                <a class="nav-link" href="#0">
                                                    <span class="sidebar-mini"> T </span>
                                                    <span class="sidebar-normal"> Tareas </span>
                                                </a>
                                            </li>
                                            <li class="nav-item ">
                                                <a class="nav-link" href="#0">
                                                    <span class="sidebar-mini"> O </span>
                                                    <span class="sidebar-normal"> Otros </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="components/buttons.html">
                                        <span class="sidebar-mini"> CE </span>
                                        <span class="sidebar-normal"> Crear Evaluación </span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="components/grid.html">
                                        <span class="sidebar-mini"> SE </span>
                                        <span class="sidebar-normal"> Subir Evaluación </span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>

                    <!--
                        ADINISTRACION UNIVERSITARIA
                    -->
                    @if (Auth::user()->id_persona == 1)
                      <li class="nav-item ">
                        <a class="nav-link" data-toggle="collapse" href="#universidad">
                            <i class="material-icons">account_balance</i>
                            <p>Admin. Universidad
                                <b class="caret"></b>
                            </p>
                        </a>
                    <!--
                        lISTA DE EJERCICIO
                    -->
                        <div class="collapse" id="universidad">
                            <ul class="nav">

                                <!--<li class="nav-item ">
                                    <a class="nav-link" data-toggle="collapse" href="#ejercicios">
                                        <span class="sidebar-mini"> E </span>
                                        <span class="sidebar-normal">Ejercicios
                                            <b class="caret"></b>
                                        </span>

                                    </a>

                                    <div class="collapse" id="ejercicios">
                                        <ul class="nav">
                                            <li class="nav-item ">
                                                <a class="nav-link" href="{{url('mis/ejercicios')}}">
                                                    <span class="sidebar-mini"> ME </span>
                                                    <span class="sidebar-normal"> Mis Ejercicios </span>
                                                </a>
                                            </li>
                                            <li class="nav-item ">
                                                <a class="nav-link" href="{{url('otros/ejercicios')}}">
                                                    <span class="sidebar-mini"> TE </span>
                                                    <span class="sidebar-normal"> Todos Los Ejercicios </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>-->

                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('administracion/facultad')}}">
                                        <span class="sidebar-mini"> F </span>
                                        <span class="sidebar-normal">Facultades</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{url('gestion/solucion')}}">
                                        <span class="sidebar-mini"> CS </span>
                                        <span class="sidebar-normal"> Crear Solución </span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="pages/login.html">
                                        <span class="sidebar-mini"> SE </span>
                                        <span class="sidebar-normal"> Subir Ejercicio </span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    @endif

                
                </ul>



            </div>
        </div>


        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
                <div class="container-fluid">
                    <div class="navbar-wrapper">


                        <div class="navbar-minimize">
                            <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round" onclick="abrir()">
                                <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                                <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
                            </button>
                        </div>


                        <a class="navbar-brand" href="#pablo">Dashboard</a>
                    </div>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-end">


                        <form class="navbar-form">
                            <div class="input-group no-border">
                                <input type="text" value="" class="form-control" placeholder="Search...">
                                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                    <i class="material-icons">search</i>
                                    <div class="ripple-container"></div>
                                </button>
                            </div>
                        </form>

                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#pablo">
                                    <i class="material-icons">dashboard</i>
                                    <p class="d-lg-none d-md-block">
                                        Stats
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="http://example.com/" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">notifications</i>
                                    <span class="notification">5</span>
                                    <p class="d-lg-none d-md-block">
                                        Some Actions
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Mike John responded to your email</a>
                                    <a class="dropdown-item" href="#">You have 5 new tasks</a>
                                    <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                                    <a class="dropdown-item" href="#">Another Notification</a>
                                    <a class="dropdown-item" href="#">Another One</a>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#pablo">
                                    <i class="material-icons">person</i>
                                    <p class="d-lg-none d-md-block">
                                        Account
                                    </p>
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>
            </nav>
            <!-- End Navbar -->


            <div class="content">

                <div class="box-body">
                    <div class="row">
                        <div class="container center">
                            <!--Contenido-->
                            @yield('contenido')
                            <!--Fin Contenido-->
                        </div>
                    </div>
                </div>

            </div>

            <footer class="footer">
                <div class="container-fluid">
                    <nav class="float-left">
                        <ul>

                            <li>
                                <a href="">
                                    Facyt
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    Computación
                                </a>
                            </li>
   
                        </ul>
                    </nav>
                    <div class="copyright float-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>, Universidad de Carabobo<i class="material-icons">favorite</i> 
                    </div>
                </div>
            </footer>
        </div>
    </div>




    <!--   Core JS Files   -->
    <script src="{{asset('js/core/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/core/popper.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>

    <script src="{{asset('js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>


    <!-- Plugin for the momentJs  -->
    <script src="{{asset('js/plugins/moment.min.js')}}"></script>

    <!--  Plugin for Sweet Alert -->
    <script src="{{asset('js/plugins/sweetalert2.js')}}"></script>

    <!-- Forms Validations Plugin -->
    <script src="{{asset('js/plugins/jquery.validate.min.js')}}"></script>

    <!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
    <script src="{{asset('js/plugins/jquery.bootstrap-wizard.js')}}"></script>

    <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="{{asset('js/plugins/bootstrap-selectpicker.js')}}"></script>

    <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
    <script src="{{asset('js/plugins/bootstrap-datetimepicker.min.js')}}"></script>

    <!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
    <script src="{{asset('js/plugins/jquery.dataTables.min.js')}}"></script>

    <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
    <script src="{{asset('js/plugins/bootstrap-tagsinput.js')}}"></script>

    <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="{{asset('js/plugins/jasny-bootstrap.min.js')}}"></script>

    <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
    <script src="{{asset('js/plugins/fullcalendar.min.js')}}"></script>

    <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
    <script src="{{asset('js/plugins/jquery-jvectormap.js')}}"></script>

    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{asset('js/plugins/nouislider.min.js')}}"></script>

    <!-- Library for adding dinamically elements -->
    <script src="{{asset('js/plugins/arrive.min.js')}}"></script>


    <!-- Chartist JS -->
    <script src="{{asset('js/plugins/chartist.min.js')}}"></script>

    <!--  Notifications Plugin    -->
    <script src="{{asset('js/plugins/bootstrap-notify.js')}}"></script>





    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{asset('js/material-dashboard.min40a0.js?v=2.0.2')}}" type="text/javascript"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{asset('demo/demo.js')}}"></script>
    <script>
        md.misc.sidebar_mini_active = true;

        function abrir() {
            $(document).ready(function() {
                $().ready(function() {

                    $('.switch-sidebar-mini input').change(function() {
                        $body = $('body');

                        $input = $(this);

                        if (md.misc.sidebar_mini_active == true) {
                            $('body').removeClass('sidebar-mini');
                            md.misc.sidebar_mini_active = false;

                            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                        } else {

                            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                            setTimeout(function() {
                                $('body').addClass('sidebar-mini');

                                md.misc.sidebar_mini_active = true;
                            }, 300);
                        }

                        // we simulate the window Resize so the charts will get updated in realtime.
                        var simulateWindowResize = setInterval(function() {
                            window.dispatchEvent(new Event('resize'));
                        }, 180);

                        // we stop the simulation of Window Resize after the animations are completed
                        setTimeout(function() {
                            clearInterval(simulateWindowResize);
                        }, 1000);

                    });
                });
            });
        }
    </script>


    <!-- Sharrre libray -->
    <script src="{{asset('demo/jquery.sharrre.js')}}"></script>

    <!-- Prism JS script to beautify the HTML code -->
    <script type="text/javascript" src="{{asset('js/prism.js')}}"></script>

    <!-- WIRIS script -->
    <script type="text/javascript" src="{{asset('js/wirislib.js')}}"></script>

    <!-- Google Analytics -->
    <script src="{{asset('js/google_analytics.js')}}"></script>

    <script>
        if (typeof urlParams !== 'undefined') {
            var selectLang = document.getElementById('lang_select');
            selectLang.value = urlParams[1];
        }
    </script>
    <script src="{{asset('ckeditor4/ckeditor.js')}}"></script>

    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            md.initDashboardPageCharts();

            md.initVectorMap();

        });
    </script>


</body>

</html>