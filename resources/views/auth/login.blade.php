@extends('layouts.auth')

{{-- @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Nombre de Usuario</label>

                                <div class="col-md-6">
                                    <input id="username" type="text"
                                        class="form-control @error('user_name') is-invalid @enderror" name="user_name"
                                        value="{{ old('user_name') }}" required autocomplete="user_name" autofocus
                                        placeholder="Ingrese su nombre de usuario">

                                    @error('user_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">Contraseña</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password" placeholder="********">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Iniciar sessión
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            Olvidó su contraseña?
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
@section('title', __('lang_v1.login'))

@section('content')
    <div class="header-left-bottom">
        <form method="POST" action="{{ route('login') }}" id="login-form">
          @csrf
            <div class="icon1 {{ $errors->has('user_name') ? ' has-error' : '' }}">
                <span class="fa fa-user"></span>
                <input id="user_name" type="text" name="user_name" required autofocus placeholder="Nombre de ususario"
                    value="{{ old('user_name') }}">
                @error('user_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="icon1 {{ $errors->has('password') ? ' has-error' : '' }}">
                <span class="fa fa-lock"></span>
                <input id="password" type="password" name="password" required placeholder="********">
                <span class="eye" onclick="mostrarContrasena()"><i class="fas fa-eye-slash icon"></i></span>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            {{-- <div class="login-check">
                <label class="checkboxs">
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recuerdame
                </label>
            </div> --}}

            <div class="bottom">
                <button type="submit" class="btn btn-primary">Iniciar session</button>
            </div>
        </form>
    </div>

@stop
@section('javascript')
    <script type="text/javascript">

        function mostrarContrasena() {
            var tipo = document.getElementById("password");
            if (tipo.type == "password") {
                tipo.type = "text";
                $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
            } else {
                tipo.type = "password";
                $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
            }
        };
        document.addEventListener('contextmenu', event => event.preventDefault())
    </script>
@endsection
