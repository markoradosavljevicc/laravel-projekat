@extends('layouts.app')

@section('title', 'Izmeni servis')

@section('content')

<div style="height: 80px;"></div> <!-- Spacer da ne udara header -->

<div class="container py-5">
    <h2 class="mb-4">Izmena servisa</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Bitno: koristi ceo objekat $servis, ne ID -->
    <form action="{{ route('servis.update', ['servis' => $servis->id]) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="naziv" class="form-label">Naziv</label>
            <input type="text" name="naziv" class="form-control" value="{{ old('naziv', $servis->naziv) }}" required>
        </div>

        <div class="mb-3">
            <label for="opis" class="form-label">Opis</label>
            <textarea name="opis" class="form-control" rows="3" required>{{ old('opis', $servis->opis) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="telefon" class="form-label">Telefon</label>
            <input type="text" name="telefon" class="form-control" value="{{ old('telefon', $servis->telefon) }}" required>
        </div>

        <div class="mb-3">
            <label for="adresa" class="form-label">Adresa</label>
            <input type="text" name="adresa" class="form-control" value="{{ old('adresa', $servis->adresa) }}" required>
        </div>

        <div class="mb-3">
            <label for="ikona" class="form-label">Ikona (opciono)</label>
            <input type="text" name="ikona" class="form-control" value="{{ old('ikona', $servis->ikona) }}">
        </div>

        <button type="submit" class="btn btn-primary">Sačuvaj izmene</button>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Nazad</a>
    </form>
</div>
@endsection
