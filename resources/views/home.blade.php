@extends('layouts.app')

@section('content')

<div class="wrapper wrapper-full-page">
    <div class="page-header lock-page header-filter" style="background-image: url('{{asset('img/logina.jpg')}}'); background-size: cover; background-position: top center;">
        <!--   you can change the color of the filter page using: data-color="blue | green | orange | red | purple" -->
        <div class="container">
            <div class="col-md-4 ml-auto mr-auto">
                <div class="card card-hidden">
                    <div class="card-header ">
                       Recuperación de Clave Exitosa
                    </div>
                    <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            Felicidades
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
                <div class="container">
                    <nav class="float-left">
                        <ul>
                            <li>
                                <a>Facyt </a>
                            </li>
                            <li>
                                <a>Computación</a>
                            </li>
                            <li>
                                <a> EDI </a>
                            </li>
                            <li>
                                <a>EDII</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright float-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>, Universidad De Carabobo
                    </div>
                </div>
            </footer>
    </div>
</div>

@endsection
