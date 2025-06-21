<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>SIBA</title>
    <link href="{{ asset('bootstrap/logo_anjing_dan_kucing.png') }}" rel="icon">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap/icons/animal-icons.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #00a8e8;
            --secondary-color: #b5446e;
            --dark-color: #333333;
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        /* Navbar Styles */
        .navbar {
            background-color: var(--primary-color);
            padding: 1rem 0;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
        }

        .navbar-brand img {
            height: 40px;
            margin-right: 10px;
        }

        .navbar-brand span {
            color: white;
            font-size: 24px;
            font-weight: 600;
        }

        .navbar-nav .nav-link {
            color: white !important;
            margin-left: 20px;
            font-weight: 500;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            min-height: 400px;
            position: relative;
            overflow: hidden;
            padding: 60px 0;
        }

        .hero-content {
            color: white;
            position: relative;
            z-index: 2;
        }

        .hero-content h1 {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .hero-content p {
            font-size: 20px;
            margin-bottom: 30px;
        }

        .hero-image {
            position: absolute;
            right: 0;
            bottom: 0;
            max-width: 50%;
            z-index: 1;
        }

        /* Animal Categories */
        .categories {
            padding: 40px 0;
            background-color: #f8f9fa;
        }

        .category-card {
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            transition: transform 0.3s ease;
            cursor: pointer;
            height: 100%;
        }

        .category-card:hover {
            transform: translateY(-5px);
        }

        .category-card img {
            width: 80px;
            height: 80px;
            margin-bottom: 15px;
        }

        .category-card h3 {
            font-size: 18px;
            color: var(--dark-color);
            margin: 0;
        }

        /* Button Styles */
        .btn-custom {
            padding: 10px 25px;
            border-radius: 25px;
            font-weight: 500;
            text-transform: uppercase;
            margin: 5px;
            transition: all 0.3s ease;
        }

        .btn-login {
            background-color: transparent;
            border: 2px solid white;
            color: white;
        }

        .btn-register {
            background-color: white;
            border: 2px solid white;
            color: var(--primary-color);
        }

        .btn-login:hover, .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
    </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto" >
      <a href="navbar-brand">
        <img src="{{ asset('bootstrap/logo_anjing_dan_kucing.png') }}" width="150" height="40" class="d-inline-block align-top" alt="SIBA Logo">

      </a>
    </h1>


      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active">
            <a href="#hero" style="font-size:18px; color:white; font-weight: bold;"> Home</a>
          </li>
          <li><a href="#services" style="font-size:18px; color:white; font-weight: bold;"> List Jadwal</a></li>
          <li><a href="#contact" style="font-size:18px; color:white; font-weight: bold;"> Contact</a></li>

        </ul>
      </nav><!-- .nav-menu -->

      <!-- <a href="{{ route('register') }}" class="get-started-btn scrollto">Register Now</a> -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="container text-center text-md-left" data-aos="fade-up">
      <h1>Welcome To Pawcation</h1>
      <h2>More Than Just A Stay, It's Their Second Home.</h2>
      <a href="{{ route('login') }}" class="btn-get-started scrollto">Login</a>
      <a href="{{ route('register') }}"  class="btn-get-started scrollto">Register Now</a>
    </div>
  </section><!-- End Hero -->
  <main id="main">

  <!-- ======= Check Jadwal ======= -->
{{--
    <div class="section-center">
        <div class="container">
            <div class="row"> --}}
                <div class="booking-form">
                    <form method="get" action="{{ route('carihome') }}">
                        <div class="row no-margin">

                            <div class="col-md-9">
                                <div class="row no-margin">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span class="form-label">Tanggal</span>
                                            <input class="form-control" name="search" type="date" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <span class="form-label">Pilih Sesi</span>
                                            <select class="form-control" name="sesi">
                                                <option value="Pagi">Pagi (08:00 - 11:00 WIB)</option>
                                                <option value="Siang">Siang (12:00 - 15:00 WIB) </option>
                                            </select>
                                            <span class="select-arrow"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-btn">
                                    <button class="submit-btn">Cek Jadwal</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            {{-- </div>
        </div>
    </div> --}}

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container">

        <div class="section-title">
          <h2>List Jadwal Tersedia</h2>
          <p>Daftar Sekarang</p>
        </div>
        @foreach($jadwal->chunk(3) as $chunk)

        <div class="row">
            @foreach ($chunk as $jadwal)

            <div class="col-lg-4 col-md-1 d-flex align-items-stretch"  id="range">
                <div class="icon-box">
                    <div class="jumbotron">
                        <p class="atas" style="font-size: 24px">{{ date('F', strtotime($jadwal->jadwal_date)) }}</p>

                        <h1>{{ date('d', strtotime($jadwal->jadwal_date)) }}</h1>
                        <hr>
                        <p style="font-weight: bold; font-size:16px">{{ $jadwal->jam_sesi }}</p>
                        <p style="font-weight: bold; font-size:16px">Available {{ $jadwal->jumlah }}</p>

                      </div>
                      @if($jadwal->jumlah >= '1')
                      <a href="{{ route('registrasiantrean',$jadwal->id) }}"  class="btn btn-info">Daftar Antrean </a>
                      @endif


                </div>

            </div>
            @endforeach
      </div>
      @endforeach

    </div>
    </section><!-- End Services Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container">

        <div class="text-center">
          <h3>Pets are humanizing</h3>
          <p>Animals are sentient, intelligent, perceptive, funny and entertaining</p>
          <a class="cta-btn" href="{{ route('admin.login') }}">Login Admin</a>
        </div>

      </div>
    </section><!-- End Cta Section -->

    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Contact</h2>
          <p>Lokasi Hotel Pet</p>
        </div>

        <div class="row no-gutters justify-content-center" data-aos="fade-up">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Location:</h4>
                <p>Jl. Kayu Jati V No.2, RT.8/RW.5, Rawamangun, Kec. Pulo Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13220</p>
              </div>

              <div class="email mt-4">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p>Kelompok28@gmail.com</p>
              </div>

              <div class="phone mt-4">
                <i class="icofont-phone"></i>
                <h4>Call:</h4>
                <p>(0888) 56650887887 </p>
              </div>

            </div>

          </div>

          <div class="col-lg-5 d-flex align-items-stretch">
            <iframe style="border:0; width: 100%; height: 320px;" src="https://maps.google.com/maps?q=-6.190457,106.885754&z=17&output=embed" frameborder="0" allowfullscreen></iframe>

          </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>Pawcation</span></strong> 2025
      </div>

    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->


  <script src="{{asset('bootstrap/jquery/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('bootstrap/jquery/jquery.easing/jquery.easing.min.js')}}"></script>


  <!-- Template Main JS File -->
  <script src="{{asset('bootstrap/js/main.js')}}"></script>

</body>

</html>
