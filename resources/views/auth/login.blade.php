@extends('auth.layouts.main')

@section('login-screen')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

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
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

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
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="text-center">
    <a href="{{ route('login') }}" class="navbar-brand"><img src="./static/logopolindra.png" height="80" alt=""></a>
</div>
<form class="card card-md" action="{{ route('login') }}" method="POST">
    @csrf
    <div class="card-body">
        <h2 class="card-title text-center mb-4">LOGIN AKUN</h2>
        <div class="mb-3">
            @error('email')
            <div class="alert alert-danger auto-close">{{ $message }}</div>
            @enderror
            <label class="form-label" for="email">Alamat Email</label>
            <input required type="email" class="form-control" placeholder="Masukan email" autocomplete="email" name="email" autofocus value="{{ old('email') }}">
        </div>
        @error('password')
        <div class="alert alert-danger auto-close" role="alert">
            {{ $message }}
        </div>
        @enderror
        <div class="mb-2">
            <label class="form-label" for="pass">
                Password
            </label>
            <div class="input-group input-group-flat">
                <input required type="password" class="form-control" autocomplete="current-password" name="password" id="pass" placeholder="Password">
                <span class="input-group-text">
                    <input type="button" class="btn-link text-decoration-none" name="submit" value="Show password" id="show" onclick="ShowPassword()">
                    <input type="button" style="display: none" class="btn-link text-decoration-none" id="hide" value="Hide Password" onclick="HidePassword()">
                </span>
            </div>
        </div>
        <div class="mb-2">
            <label class="form-check" for="remember">
                <input name="remember" type="checkbox" class="form-check-input"{{ old('remember' ? 'checked' : '') }}/>
                <span class="form-check-label">Remember me</span>
            </label>
        </div>
        <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100">Masuk</button>
        </div>
    </div>
    <div class="hr-text">or</div>
    <div class="card-body">
        <div class="row">
            <div class="col"><a href="." class="btn btn-white w-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                </svg>
                Menu utama
            </a></div>
            <div class="col">
                @if(Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="btn btn-white w-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-key" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="8" cy="15" r="4"></circle>
                        <line x1="10.85" y1="12.15" x2="19" y2="4"></line>
                        <line x1="18" y1="5" x2="20" y2="7"></line>
                        <line x1="15" y1="8" x2="17" y2="10"></line>
                    </svg>
                    Lupa password
                </a>
                @endif
            </div>
        </div>
    </div>
</form>

@endsection
