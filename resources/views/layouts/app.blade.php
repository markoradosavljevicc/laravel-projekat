<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

  <title>@yield('title', 'Sixteen Clothing')</title>

  <!-- CSS fajlovi -->
  <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/templatemo-sixteen.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">

  <!-- Owl Carousel CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

  @yield('head') {{-- Za dodatne stilove po potrebi --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

</head>

<body>
  <!-- Preloader -->
  <div id="preloader">
    <div class="jumper">
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>

  <!-- HEADER -->
  <header class="">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
          <img src="{{ asset('assets/images/logokida.png') }}" alt="Logo" style="height: 60px;">
          <span style="font-size: 1.5rem; font-weight: bold; color: #d16c28fb;"></span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
              <a class="nav-link" href="{{ url('/') }}">Početna</a>
            </li>
            <li class="nav-item {{ request()->is('products') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('katalog') }}">Katalog</a>
            </li>
            <li class="nav-item {{ request()->is('about') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('servisi.public') }}">Servisi</a>
            </li>
            <li class="nav-item {{ request()->is('kontakt') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('kontakt') }}">Kontakt</a>
            </li>
             <li class="nav-item {{ request()->is('login') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <!-- SADRŽAJ STRANICE -->
  <main>
    @yield('content')
  </main>


    <!-- FOOTER -->
    <footer class="text-white" style="background: #1a1a1a; padding-top: 60px; padding-bottom: 30px;">
        <style>
            .text-orange {
                color: #d16c28 !important;
            }
        </style>

        <div class="container">
            <div class="row">

                <!-- LOGO + OPIS -->
                <div class="col-md-4 mb-4">
                    <h4 class="text-orange mb-3">Mareli</h4>
                    <p style="color: #ccc;">
                        Stručnjaci za kotlove na drva i pelet. Pružamo profesionalne usluge montaže, servisa i podrške. Vaša toplina je naš posao.
                    </p>
                </div>

                <!-- LINKOVI -->
                <div class="col-md-4 mb-4">
                    <h5 class="text-orange mb-3">Navigacija</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ url('/') }}" class="text-decoration-none text-white">Početna</a></li>
                        <li class="mb-2"><a href="{{ route('katalog') }}" class="text-decoration-none text-white">Katalog</a></li>
                        <li class="mb-2"><a href="{{ route('servisi.public') }}" class="text-decoration-none text-white">Servisi</a></li>
                        <li class="mb-2"><a href="{{ route('kontakt') }}" class="text-decoration-none text-white">Kontakt</a></li>
                    </ul>
                </div>

                <!-- KONTAKT -->
                <div class="col-md-4 mb-4">
                    <h5 class="text-orange mb-3">Kontakt</h5>
                    <p><i class="fas fa-map-marker-alt text-orange me-2"></i> Bulevar kralja Aleksandra 123, Beograd</p>
                    <p><i class="fas fa-phone text-orange me-2"></i> +381 60 123 4567</p>
                    <p><i class="fas fa-envelope text-orange me-2"></i> info@marelli.rs</p>

                    <div class="mt-3">
                        <a href="#" class="text-white me-3"><i class="fab fa-facebook fa-lg"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-instagram fa-lg"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-linkedin fa-lg"></i></a>
                    </div>
                </div>

            </div>

            <hr class="border-secondary mt-4">

            <div class="text-center" style="color: #888;">
                <small>&copy; {{ date('Y') }} Marelli. Sva prava zadržana. </small>
            </div>
        </div>
    </footer>



  <!-- JS fajlovi -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>
  <script src="{{ asset('assets/js/owl.js') }}"></script>
  <script src="{{ asset('assets/js/slick.js') }}"></script>
  <script src="{{ asset('assets/js/isotope.js') }}"></script>
  <script src="{{ asset('assets/js/accordions.js') }}"></script>
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>


  <!-- Owl Carousel JS CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

  <script>
    let cleared = [0, 0, 0];
    function clearField(t) {
      if (!cleared[t.id]) {
        cleared[t.id] = 1;
        t.value = '';
        t.style.color = '#fff';
      }
    }
  </script>

  @yield('scripts') {{-- JS specifičan za pojedinačne stranice --}}
  @stack('scripts')

</body>
</html>
