@extends('layouts.app')

@section('title', 'Kontakt')

@section('content')

<!-- Hero sekcija -->
<div class="page-heading contact-heading header-text">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="text-content">
          <h4>kontaktirajte nas</h4>
          <h2>budimo u kontaktu</h2>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Mapa i opis -->
<div class="find-us py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>Naša lokacija</h2>
        </div>
      </div>
      <div class="col-md-8 mb-4">
        <div id="map">

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2969.7351410582587!2d23.107034276602246!3d41.89855286413257!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14aa5b787314b78d%3A0x32808f19a0213915!2sMareli%20Systems%20LTD!5e0!3m2!1sen!2srs!4v1748000374599!5m2!1sen!2srs" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        </div>
      </div>
      <div class="col-md-4">
        <div class="left-content">
          <h4 style="color: #ff6600;">O našoj firmi</h4>
          <p>
            Marelli je porodična firma sa višegodišnjim iskustvom u oblasti grejanja.
            Pružamo sveobuhvatna rešenja za domaćinstva i poslovne objekte – od odabira sistema, preko montaže, do redovnog servisa.
            Naš tim inženjera i tehničara konstantno unapređuje znanje i prati savremene tehnologije u domenu grejanja.
            Naš cilj je da vam pružimo efikasno, pouzdano i dugoročno rešenje za toplinu vašeg doma.
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Kontakt forma -->
<div class="send-message py-5" style="background-color: #f8f9fa;">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mb-4">
        <div class="section-heading">
          <h2>Pošaljite nam poruku</h2>
        </div>
      </div>
      <div class="col-md-8">
        <div class="contact-form">
          <form id="contact" action="" method="post">
            <div class="row">
              <div class="col-lg-12 mb-3">
                <input name="name" type="text" class="form-control" placeholder="Vaše ime i prezime" required>
              </div>
              <div class="col-lg-12 mb-3">
                <input name="email" type="email" class="form-control" placeholder="Email adresa" required>
              </div>
              <div class="col-lg-12 mb-3">
                <input name="subject" type="text" class="form-control" placeholder="Naslov poruke" required>
              </div>
              <div class="col-lg-12 mb-3">
                <textarea name="message" rows="6" class="form-control" placeholder="Vaša poruka" required></textarea>
              </div>
              <div class="col-lg-12 mt-3">
                <button type="submit" class="btn btn-primary btn-lg w-100" style="background-color: #ff6600; border: none;">Pošalji poruku</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-4">
        <ul class="accordion">
          <li>
            <a>Radno vreme</a>
            <div class="content">
              <p>Pon - Pet: 08:00 - 17:00<br>Subota: 08:00 - 14:00<br>Nedelja: Zatvoreno</p>
            </div>
          </li>
          <li>
            <a style="color: #ff6600;">Gde se nalazimo?</a>
            <div class="content">
              <p>Naš prodajni objekat se nalazi u Beogradu. Dostavu vršimo na teritoriji cele Srbije.</p>
            </div>
          </li>
          <li>
            <a style="color: #ff6600;">Podrška i servis</a>
            <div class="content">
              <p>Naš tim tehničara stoji vam na raspolaganju za montažu i održavanje uređaja.</p>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

@endsection
