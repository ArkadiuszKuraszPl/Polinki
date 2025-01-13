@extends('layouts.auth')

@section('content')
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html {
        font-size: 10px;
        font-family: 'Nunito', sans-serif;
    }

    .container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        height: 100vh;
    }

    .form_container {
        position: relative;
        top: 0;
        left: 0;
    }

    .form {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 400px;
    }

    .form_title {
        text-align: center;
    }

    img {
        width: 250px;
        margin-top: 20px;
    }

    .form {
        padding: 30px;
    }

    .form_title p {
        font-size: 1.5rem;
        color: #555;
        width: 80%;
        text-align: center;
        margin: 0 auto;
        margin-top: 20px;
    }

    .info_container {
        background: rgb(181,0,217);
        background: linear-gradient(30deg, rgba(181,0,217,1) 0%, rgba(121,8,242,1) 85%); 
    }

    form {
        margin-top: 15px;
    }

    form input {
        width: 100%;
        border: 1px solid #ccc;
        margin-top: 5px;
    }

    form input,
    form button {
        padding: 10px 15px;
        font-size: 1.5rem;
        border-radius: 3px;
        margin-top: 5px;
    }

    form button {
        color: #f5f5f5;
        /* background: rgb(181,0,217);
        background: linear-gradient(30deg, rgba(181,0,217,1) 0%, rgba(121,8,242,1) 85%); */
        background-color: rgb(181,0,217);
        border: none;
        transition: 0.3s;
        font-weight: 500;
        width: 100%;

    }

    form button:hover {
        /* background: rgb(132,0,158);
        background: linear-gradient(30deg, rgba(132,0,158,1) 0%, rgba(62,0,128,1) 78%); */
        background-color: rgba(121,8,242,1);
    }


    .info_container {
        position: relative;
        top: 0;
        left: 0;
    }

    .info {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .forgot_pass {
        width: 100%;
        display: inline-block;
        color: #555;
        font-size: 1.2rem;
        margin-top: 20px;
        text-align: center;
        transition: 0.3s;
    }

    .forgot_pass:hover {
        color: #111;
    }
</style>

<div class="container">
    <div class="form_container">
        <div class="form">
            <div class="form_title">
                <img src="{{ asset('images/logo_polinki.svg') }}" alt="Logo Polinki - Agregator Linków">
                <p>Zaloguj się i rozpocznij budowę swojego magazynu linków!</p>
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
        <div class="info">
            <img src="{{ asset('images/logo_polinki_white.svg') }}" alt="Logo Polinki - Agregator Linków" class="logo_white">
        </div>
    </div>
</div>
@endsection
