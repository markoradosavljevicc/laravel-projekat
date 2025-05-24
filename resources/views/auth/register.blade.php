@extends('layouts.app')

@section('title', 'Registracija')

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
        min-height: calc(100vh - 180px);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .card-register {
        border-radius: 10px;
        border: none;
        background: #ffffff;
    }
</style>

<div class="container auth-container py-5">
    <div class="row justify-content-center w-100">
        <div class="col-md-6 col-lg-5">

            <h2 class="mb-4 text-center text-uppercase text-warning">Registracija</h2>

            <div class="card shadow card-register">
                <div class="card-body px-4 py-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Ime i prezime -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Ime i prezime</label>
                            <input id="name" type="text" name="name" value="{{ old('name') }}"
                                   placeholder="Unesite vaše ime i prezime"
                                   class="form-control @error('name') is-invalid @enderror"
                                   required autofocus autocomplete="name">
                            @error('name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email adresa</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}"
                                   placeholder="Unesite vašu email adresu"
                                   class="form-control @error('email') is-invalid @enderror"
                                   required autocomplete="username">
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
                                   required autocomplete="new-password">
                            @error('password')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Potvrda lozinke -->
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label">Potvrda lozinke</label>
                            <input id="password_confirmation" type="password" name="password_confirmation"
                                   placeholder="Ponovite lozinku"
                                   class="form-control" required autocomplete="new-password">
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('login') }}" class="text-decoration-none">Već imate nalog?</a>
                            <button type="submit" class="btn btn-warning text-white px-4">
                                Registruj se
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
