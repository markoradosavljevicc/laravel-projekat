@extends('layouts.app')

@section('title', 'Katalog kotlova')

@section('content')
<style>
    header {
        position: sticky;
        top: 0;
        z-index: 1000;
        background-color: #222;
    }
    .btn-primary {
        background-color: #ff6600;
        border-color: #ff6600;
    }
    .btn-primary:hover {
        background-color: #e65c00;
        border-color: #e65c00;
    }
    .btn-outline-primary {
        color: #ff6600;
        border-color: #ff6600;
    }
    .btn-outline-primary:hover {
        background-color: #ff6600;
        color: #fff;
    }
    h2, h5.card-title {
        color: #333;
    }
    .card {
        border-radius: 8px;
    }
</style>

<div class="container my-5">
    <h2 class="mb-5 text-center text-uppercase">Katalog kotlova</h2>

    <div class="row">
        <!-- Leva kolona - Filteri -->
        <!-- Leva kolona - Filteri -->
<div class="col-md-3">
    <div class="card shadow-sm border-0 mb-4" style="background-color: #f7f7f7;">
        <div class="card-header bg-dark text-white text-center rounded-top">
            <h5 class="mb-0">Filtriraj</h5>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('katalog') }}">
                <div class="form-group mb-4">
                    <label for="naziv" class="form-label fw-bold">Naziv kotla</label>
                    <input type="text" name="naziv" id="naziv" value="{{ request('naziv') }}" class="form-control rounded-1 shadow-sm" placeholder="npr. Alfa 25">
                </div>

                <div class="form-group mb-4">
                    <label for="tip" class="form-label fw-bold">Tip kotla</label>
                    <select name="tip" id="tip" class="form-select rounded-1 shadow-sm">
                        <option value="">Svi tipovi</option>
                        <option value="drva" {{ request('tip') == 'drva' ? 'selected' : '' }}>Na drva</option>
                        <option value="pelet" {{ request('tip') == 'pelet' ? 'selected' : '' }}>Na pelet</option>
                    </select>
                </div>

                <div class="form-group mb-4">
                    <label for="sort" class="form-label fw-bold">Sortiraj po ceni</label>
                    <select name="sort" id="sort" class="form-select rounded-1 shadow-sm">
                        <option value="">Bez sortiranja</option>
                        <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Rastuće</option>
                        <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Opadajuće</option>
                    </select>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary rounded-1">Primeni filtere</button>
                </div>
            </form>
        </div>
    </div>
</div>



        <!-- Desna kolona - Proizvodi -->
        <div class="col-md-9">
            <div class="row">
                @forelse($kotlovi as $kotao)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100 shadow border-0">
                            <img src="{{ asset('storage/kotlovi/' . $kotao->slika) }}" class="card-img-top rounded-top" alt="{{ $kotao->naziv }}" style="height: 250px; object-fit: cover;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $kotao->naziv }}</h5>
                                <p class="card-text text-muted small">{{ Str::limit($kotao->opis, 100) }}</p>
                                <p class="mb-1"><span class="fw-bold">Tip:</span> {{ ucfirst($kotao->tip) }}</p>
                                <p class="mb-3"><span class="fw-bold">Cena:</span> {{ number_format($kotao->cena, 2) }} RSD</p>
                                <a href="{{ route('kotlovi.show', $kotao->id) }}" class="btn btn-outline-primary mt-auto">Detaljnije</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-warning text-center">
                            Nema proizvoda koji odgovaraju vašoj pretrazi.
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
