@extends('layouts.app')

@section('title', $kotao->naziv)




@section('content')


<div style="height: 110px;"></div>

<style>
    header {
        position: sticky;
        top: 0;
        z-index: 1000;
        background-color: #222;
    }
    .btn-outline-secondary {
        color: #ff6600;
        border-color: #ff6600;
    }
    .btn-outline-secondary:hover {
        background-color: #ff6600;
        color: #fff;
        border-color: #ff6600;
    }
    .kotao-info h2 {
        color: #333;
    }
</style>

<div class="container my-5">
    <div class="row">
        <div class="col-md-6 mb-4">
            <img src="{{ asset('storage/kotlovi/' . $kotao->slika) }}" class="img-fluid rounded shadow" alt="{{ $kotao->naziv }}">
        </div>
        <div class="col-md-6 kotao-info">
            <h2 class="mb-3">{{ $kotao->naziv }}</h2>
            <p class="text-muted">{{ $kotao->opis }}</p>
            <p><strong>Tip:</strong> {{ ucfirst($kotao->tip) }}</p>
            <p><strong>Cena:</strong> {{ number_format($kotao->cena, 2) }} RSD</p>
            <a href="{{ route('katalog') }}" class="btn btn-outline-secondary mt-4">&larr; Nazad na katalog</a>
        </div>
    </div>
    @auth
    @if(Auth::user()->role->name === 'user')
        <form action="{{ route('narudzbine.store') }}" method="POST">
            @csrf
            <input type="hidden" name="kotlovi_id" value="{{ $kotao->id }}">
            <div class="mb-3">
                <label for="kolicina" class="form-label">Količina</label>
                <input type="number" name="kolicina" class="form-control" min="1" value="1" required>
            </div>
            <div class="mb-3">
                <label for="napomena" class="form-label">Napomena</label>
                <textarea name="napomena" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Poruči</button>
        </form>
    @endif
@endauth

</div>
@endsection
