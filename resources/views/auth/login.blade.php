@extends('layouts.auth')

@section('content')
<style>
    .info_container {
        background-image: url('/images/background_auth.jpg');
    }
</style>
<div class="container">
    <div class="form_container">
        <div class="form">
            <div class="form_title">
                <img src="{{ asset('images/logo_polinki.svg') }}" alt="Logo Polinki - Agregator Linków">
                <p class="mt-2">Zaloguj się i rozpocznij budowę swojego magazynu linków!</p>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <!-- <div class="row mb-3">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div> -->

                <div class="row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Zaloguj się
                        </button>

                        @if (Route::has('password.request'))
                            <a class="forgot_pass" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="info_container">
        <div class="bcg">
            <div class="info">
                <img src="{{ asset('images/logo_polinki_white.svg') }}" alt="Logo Polinki - Agregator Linków" class="logo_white">
            </div>
        </div>
    </div>
</div>
@endsection
