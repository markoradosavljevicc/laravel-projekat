@extends('layouts.app')

@section('title', 'Naši servisi')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-4">Naši servisi</h2>
    <div class="row">
        @foreach($servisi as $servis)
            <div class="col-md-4 mb-4">
            <div class="card h-100 text-center shadow-sm p-4">

                <div class="mb-3">
                    <i class="{{ $servis->ikona }} fa-2x text-orange"></i>
                </div>

                <h5 class="card-title">{{ $servis->naziv }}</h5>
                <p class="card-text">{{ $servis->opis }}</p>
                <p class="text-muted"><strong>Telefon:</strong> {{ $servis->telefon }}</p>
                <p class="text-muted"><strong>Adresa:</strong> {{ $servis->adresa }}</p>
            </div>
</div>



        @endforeach
    </div>


</div>


<div class="container my-5">
    <h3 class="text-center mb-4">Lokacije servisa</h3>
    <div id="map" style="height: 500px;"></div>
</div>

@endsection

@section('scripts')
<script>
    var map = L.map('map').setView([44.7866, 20.4489], 6); // centar Srbije

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
    }).addTo(map);

    // Dodaj markere ručno (ili preko petlje ako imaš lat/lng u bazi)
    L.marker([44.8125, 20.4612]).addTo(map).bindPopup('Servis 1 - Beograd');
    L.marker([45.2550, 19.8450]).addTo(map).bindPopup('Servis 2 - Novi Sad');
    L.marker([43.3209, 21.8958]).addTo(map).bindPopup('Servis 3 - Niš');
    L.marker([44.0128, 20.9110]).addTo(map).bindPopup('Servis 4 - Kragujevac');
    L.marker([46.1000, 19.6667]).addTo(map).bindPopup('Servis 5 - Subotica');
</script>
@endsection

