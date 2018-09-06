@extends('layouts.app') @section('content')

<div class="wrapper wrapper-full-page">
    <div class="page-header lock-page header-filter" style="background-image: url('{{asset('img/lock.jpg')}}')">
        <!--   you can change the color of the filter page using: data-color="blue | green | orange | red | purple" -->
        <div class="container">
            <div class="col-md-4 ml-auto mr-auto">
                <div class="card card-profile text-center card-hidden">
                    <div class="card-header ">
                        <div class="card-avatar">
                            <a>
                                <img class="img" src="{{asset('img/placeholder.jpg')}}">
                            </a>
                        </div>
                    </div>
                    <div class="card-body ">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                            @csrf
                            <h4 class="card-title">Recuperacion de Contraseña</h4>
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Ingrese el Correo</label>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required> @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span> @endif
                            </div>
                          
                                <div class="card-footer justify-content-center">
                                    <button type="submit" class="btn btn-primary">
                                        Recuperar
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