@extends('layouts.app') @section('content')


<!-- End Navbar -->

<div class="wrapper wrapper-full-page">
    <div class="page-header login-page header-filter" filter-color="black" style="background-image: url('{{asset('img/login.png')}}'); background-size: cover; background-position: top center;">
        <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
        <div class="container">
            <div class="col-lg-4 col-md-6 col-sm-6 ml-auto mr-auto">
                <div class="card card-login card-hidden">
                    <div class="card-header card-header-rose text-center">
                        <h4 class="card-title">Inicio de Sesión</h4>
                        <img src="{{asset('img/sesion.png')}}" width="100" height="100" alt="">
                    </div>
                    <div class="card-body ">
                        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                            @csrf
                            <span class="bmd-form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">face</i>
                                        </span>
                                    </div>

                                    <input id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"
                                        required autofocus placeholder="Usuario"> @if($errors->has('name'))
                                    <span class="invalid-feedback" role="alert" placeholder="Usuario">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span> @endif
                                </div>
                            </span>
                            <span class="bmd-form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">lock_outline</i>
                                        </span>
                                    </div>
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                        required placeholder="Contraseña"> @if ($errors->has('password')
                                    )
                                    <span class="invalid-feedback" role="alert" placeholder="Usuario">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span> @endif
                                </div>
                            </span>
                            <br>
                            <div class="card-footer justify-content-center">
                                <button type="submit" class="btn btn-primary ">
                                    {{ __('Iniciar') }}
                                </button>
                            </div>

                        </form>

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