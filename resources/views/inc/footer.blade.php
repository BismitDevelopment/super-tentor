<link rel="stylesheet" href="{{ asset('css/footer.css') }}">
<div class="page-6 d-flex flex-column align-items-center">
  <div class="footer-container">
      <div class="register-bar">
          <div class="d-flex justify-content-between align-items-center">
              <h3>Belajar sekarang juga!</h3>
              <a href="/register">Daftar Sekarang</a>
          </div>
      </div>
      <div class="bottom-footer container-fluid">
          <div class="row">
              <div class="col-12 col-lg-2 d-none d-lg-flex justify-content-center">
                  <img class="logo" src="/img/svg-landing/logo-white.svg" alt="">
              </div>
              <div class="col-12 col-lg-5 d-flex contact-info justify-content-center">
                  <div class="contact-list">
                      <h4>Contact</h4>
                      <div><img src="/img/svg-landing/whatsapp.svg" alt="">0851-5633-2836</div>
                      <div><img src="/img/svg-landing/instagram.svg" alt="">@supertentor_</div>
                      <div><img src="/img/svg-landing/line.svg" alt="">@supertentor</div>
                  </div>
                  <div>
                      <h4>Navigasi</h4>
                      <h5>Home</h5>
                      <h5>Produk</h5>
                      <h5>Program</h5>
                      <h5>Event</h5>
                  </div>
              </div>
              <div class="col-12 col-lg-5 d-flex flex-column align-items-center form-container">
                  <h4>Silahkan Isi form di bawah Ini, admin kami akan segera menghubungi anda.</h4>
                  <form action="" class="d-flex flex-column align-items-center">
                      @csrf
                      <input type="text" placeholder="Nama Lengkap">
                      <input type="text" placeholder="Email / No WA">
                      <button>Submit</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>