@extends('layouts.app')

@section('title', 'Početna')

@section('content')

<style>
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
        border-color: #ff6600;
    }
    section {
        background-color: #f9f9f9;
    }
    .card-title {
        color: #333;
    }
</style>

<!-- HERO sekcija sa tekstom -->
<section class="hero-banner position-relative text-white text-center" style="background-image: url('{{ asset('assets/images/hero.jpg') }}'); background-size: cover; background-position: center; height: 500px;">
    <div class="overlay" style="position:absolute;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.5);"></div>
    <div class="position-relative h-100 d-flex flex-column justify-content-center align-items-center">
        <h1 class="display-4 fw-bold">- MARELLI -</h1>
        <p class="lead text-white">Moderna rešenja grejanja na drva i pelet po meri svakog domaćinstva.</p>
        <a href="{{ route('katalog') }}" class="btn btn-primary mt-3">Pogledaj ponudu</a>
    </div>
</section>

<!-- ISTAKNUTI kotlovi -->
<section id="istaknuti" class="py-5" style="background-color: #eeeeee;">
    <div class="container">
        <h2 class="mb-4 text-center text-dark">Istaknuti kotlovi</h2>
        <div class="row">
            @forelse($istaknuti as $kotao)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="{{ asset('storage/kotlovi/' . $kotao->slika) }}" class="card-img-top" alt="{{ $kotao->naziv }}" style="object-fit: cover; height: 250px;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $kotao->naziv }}</h5>
                            <p class="card-text text-muted small">{{ Str::limit($kotao->opis, 100) }}</p>
                            <p class="card-text"><strong>Cena:</strong> {{ number_format($kotao->cena, 2) }} RSD</p>
                            <p class="card-text"><strong>Tip:</strong> {{ ucfirst($kotao->tip) }}</p>
                            <a href="{{ route('kotlovi.show', $kotao->id) }}" class="btn btn-outline-primary mt-auto">Detaljnije</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">Trenutno nema istaknutih kotlova.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- ZAŠTO NAS IZABRATI -->
<section class="py-5 bg-white border-top">
    <div class="container">
        <h2 class="text-center mb-5">Zašto nas izabrati?</h2>
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <i class="fas fa-fire fa-3x text-warning mb-3"></i>
                <h5>Energetska efikasnost</h5>
                <p>Naši kotlovi troše manje, a greju više – štedite novac bez kompromisa.</p>
            </div>
            <div class="col-md-4 mb-4">
                <i class="fas fa-tools fa-3x text-warning mb-3"></i>
                <h5>Garancija kvaliteta</h5>
                <p>Svi proizvodi imaju garanciju i podršku našeg servisnog tima.</p>
            </div>
            <div class="col-md-4 mb-4">
                <i class="fas fa-truck fa-3x text-warning mb-3"></i>
                <h5>Brza isporuka</h5>
                <p>Bez čekanja – isporuka širom Srbije u roku od 2-5 radnih dana.</p>
            </div>
        </div>
    </div>
</section>

<!-- O NAMA -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 mb-4 mb-md-0">
                <img src="{{ asset('assets/images/feature-image.jpg') }}" class="img-fluid rounded shadow" alt="O nama">
            </div>
            <div class="col-md-6">
                <h2>O nama</h2>
                <p>
                    Naša firma se bavi distribucijom i prodajom kotlova na drva i pelet. Posvećeni smo kvalitetu, energetskoj efikasnosti i dugotrajnosti naših proizvoda.
                </p>
                <p>
                    Ponosimo se višegodišnjim iskustvom i stotinama zadovoljnih korisnika širom zemlje. Bilo da vam je potreban sistem grejanja za domaćinstvo ili industriju – imamo rešenje.
                </p>
                <a href="{{ route('kontakt') }}" class="btn btn-outline-primary">Kontaktirajte nas</a>
            </div>
        </div>
    </div>
</section>

<!-- RECENZIJE -->
<section class="py-5 bg-dark">
  <div class="container-fluid testimonial">
    <div class="container py-5">
      <div class="section-title text-center mb-5">
        <h2 style="color: #ff6600;">Šta Kažu Naši Kupci</h2>
        <div class="border-top" style="border-color: #ff6600 !important; width: 25%; margin: 1rem auto;"></div>
      </div>

      <div class="owl-carousel testimonial-carousel">
        <!-- 1 -->
        <div class="testimonial-item bg-light rounded p-4">
          <div class="position-relative">
            <i class="fa fa-quote-right fa-2x text-secondary position-absolute" style="bottom: 30px; right: 0;"></i>
            <div class="mb-4 pb-4 border-bottom border-secondary">
              <p class="mb-0">"Kupio sam kotao prošle zime i oduševljen sam! Toplina cele kuće i potrošnja manja nego ikada."</p>
            </div>
            <div class="d-flex align-items-center flex-nowrap">
              <div class="bg-secondary rounded">
                <img src="{{ asset('assets/images/avatar1.png') }}" class="img-fluid rounded" style="width: 100px; height: 100px;">
              </div>
              <div class="ms-4 d-block">
                <h4 class="text-dark">Milan Petrović</h4>
                <p class="m-0 pb-3">Kupac</p>
                <div class="d-flex pe-5">
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- 2 -->
        <div class="testimonial-item bg-light rounded p-4">
          <div class="position-relative">
            <i class="fa fa-quote-right fa-2x text-secondary position-absolute" style="bottom: 30px; right: 0;"></i>
            <div class="mb-4 pb-4 border-bottom border-secondary">
              <p class="mb-0">"Najbolja podrška na svetu i veoma brza isporuka. Sve preporuke za ove momke! Posebno za Miluna!"</p>
            </div>
            <div class="d-flex align-items-center flex-nowrap">
              <div class="bg-secondary rounded">
                <img src="{{ asset('assets/images/avatar2.png') }}" class="img-fluid rounded" style="width: 100px; height: 100px;">
              </div>
              <div class="ms-4 d-block">
                <h4 class="text-dark">Jelena Ilić</h4>
                <p class="m-0 pb-3">Kupac</p>
                <div class="d-flex pe-5">
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star-half-alt text-warning"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- 3 -->
        <div class="testimonial-item bg-light rounded p-4">
          <div class="position-relative">
            <i class="fa fa-quote-right fa-2x text-secondary position-absolute" style="bottom: 30px; right: 0;"></i>
            <div class="mb-4 pb-4 border-bottom border-secondary">
              <p class="mb-0">"Najbolja podrška na svetu i veoma brza isporuka.  Posebno za Miluna!"</p>
            </div>
            <div class="d-flex align-items-center flex-nowrap">
              <div class="bg-secondary rounded">
                <img src="{{ asset('assets/images/avatar3.png') }}" class="img-fluid rounded" style="width: 100px; height: 100px;">
              </div>
              <div class="ms-4 d-block">
                <h4 class="text-dark">Dragan Stojanović</h4>
                <p class="m-0 pb-3">Kupac</p>
                <div class="d-flex pe-5">
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="far fa-star text-warning"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<!-- OWL CAROUSEL JS INIT -->
@section('scripts')
<script>
    $(document).ready(function(){
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:30,
            nav:true,
            autoplay:true,
            autoplayTimeout:5000,
            responsive:{
                0:{ items:1 },
                768:{ items:2 },
                992:{ items:3 }
            }
        });
    });
</script>
@endsection

@endsection
