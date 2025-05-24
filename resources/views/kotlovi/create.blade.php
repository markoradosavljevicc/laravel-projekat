@extends('layouts.app')

@section('title', 'Dodaj kotao')

@section('content')

<div style="height: 80px;"></div> <!-- Spacer da ne udara header -->

<div class="container py-5">
    <h2 class="mb-4">Dodaj novi kotao</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kotlovi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="naziv" class="form-label">Naziv</label>
            <input type="text" name="naziv" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="opis" class="form-label">Opis</label>
            <textarea name="opis" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label for="tip" class="form-label">Tip</label>
            <select name="tip" class="form-select" required>
                <option value="drva">Na drva</option>
                <option value="pelet">Na pelet</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="cena" class="form-label">Cena (RSD)</label>
            <input type="number" name="cena" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="slika" class="form-label">Slika</label>
            <input type="file" name="slika" class="form-control" required>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="featured" class="form-check-input" id="featured">
            <label for="featured" class="form-check-label">Istaknuti proizvod</label>
        </div>

        <button type="submit" class="btn btn-success">Sačuvaj</button>
        <a href="{{ route('katalog') }}" class="btn btn-secondary">Nazad</a>
    </form>
</div>
@endsection
