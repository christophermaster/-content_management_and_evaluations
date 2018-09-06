@extends('layouts.app') @section('content')

<div class="wrapper wrapper-full-page">
    <div class="page-header lock-page header-filter" style="background-image: url('{{asset('img/login.png')}}'); background-size: cover; background-position: top center;">
        <!--   you can change the color of the filter page using: data-color="blue | green | orange | red | purple" -->
        <div class="container">
            <div class="col-md-4 ml-auto mr-auto">
                <div class="card card-profile text-center card-hidden">
                    <div class="card-header ">
                        <div class="card-avatar">
                            <a href="#pablo">
                                <img class="img" src="{{asset('img/faces/avatar.jpg')}}">
                            </a>
                        </div>
                    </div>
                    <div class="card-body ">
                        <form method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}">
                            @csrf



                            <h4 class="card-title">Recuperacion de Contraseña </h4>
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group">
                                <label for="email" class="bmd-label-floating">Ingrese Correo</label>
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>
    
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Ingrese Contraseña</label>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                             </div>
                            <div class="form-group ">
                                <label for="password-confirm" class="bmd-label-floating">Confirme Contraseña</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
        
                                <div class="card-footer justify-content-center">
                                    <button type="submit" class="btn btn-primary">
                                        Restaurar Contraseña
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