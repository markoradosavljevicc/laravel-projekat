@extends('layouts.app')

@section('title', 'Prijava')

@section('content')

<style>
    input.form-control:focus {
        border-color: #ff6600;
        box-shadow: 0 0 0 0.2rem rgba(255, 102, 0, 0.25);
    }

    .btn-warning {
        background-color: #ff6600;
        border-color: #ff6600;
    }

    .btn-warning:hover {
        background-color: #e65c00;
        border-color: #e65c00;
    }

    .auth-container {
        min-height: calc(100vh - 180px); /* prilagođeno da gurne footer dole */
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .card-login {
        border-radius: 10px;
        border: none;
        background: #ffffff;
    }
</style>

<div class="container auth-container py-5">
    <div class="row justify-content-center w-100">
        <div class="col-md-6 col-lg-5">

            <h2 class="mb-4 text-center text-uppercase text-warning">Prijava na nalog</h2>

            @if (session('status'))
                <div class="alert alert-success mb-3">
                    {{ session('status') }}
                </div>
            @endif

            <div class="card shadow card-login">
                <div class="card-body px-4 py-4">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email adresa</label>
                            <input id="email" type="email" name="email"
                                   placeholder="Unesite vašu email adresu"
                                   value="{{ old('email') }}"
                                   class="form-control @error('email') is-invalid @enderror"
                                   required autofocus autocomplete="username">
                            @error('email')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Lozinka -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Lozinka</label>
                            <input id="password" type="password" name="password"
                                   placeholder="Unesite lozinku"
                                   class="form-control @error('password') is-invalid @enderror"
                                   required autocomplete="current-password">
                            @error('password')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Zapamti me -->
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember_me">
                            <label class="form-check-label" for="remember_me">
                                Zapamti me
                            </label>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            @if (Route::has('password.request'))
                                <a class="text-decoration-none" href="{{ route('password.request') }}">
                                    Zaboravljena lozinka?
                                </a>
                            @endif

                            <button type="submit" class="btn btn-warning text-white px-4">
                                Prijavi se
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Registracija link -->
            <p class="mt-4 text-center">
                Nemate nalog?
                <a href="{{ route('register') }}" class="text-decoration-none">Registrujte se</a>
            </p>

        </div>
    </div>
</div>
@endsection
