<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  {{-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="bootstrap/css/style.css">
  <link href="bootstrap/logoa.png" rel="icon"> --}}
  <link rel="icon" type="image/png" href="{{ asset('bootstrap/logo_anjing_dan_kucing.png') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animsition/css/animsition.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- Template Main CSS File -->
  {{-- <link href="assets/css/style.css" rel="stylesheet"> --}}
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

  <link href="{{ asset('bootstrap/css/util.css') }}" rel="stylesheet">
  <link href="{{ asset('bootstrap/css/main.css') }}" rel="stylesheet">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <title>SIBA</title>
</head>

<body>


  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('bootstrap/logo_anjing_dan_kucing.png') }}" height="40" alt="SIBA Logo">
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="mr-auto"></div>
        <ul class="navbar-nav my-2 my-lg-0">
          @guest
          @if (Route::has('login'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
          @endif

          @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
          @endif
          @else
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"data-display="static" data-toggle="dropdown" aria-haspopup="true">
              Profile
            </a>
            <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="navbarDropdown">
              <h6 class="dropdown-header">Your Account  {{ Auth::user()->name }}</h6>
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </div>
          </li>
          @endguest

        </ul>

      </div>
    </div>
  </nav>
  @guest
  @if (Route::has('login'))
    </br>

  @endif

  @else

  @endguest

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  {{-- <script src="bootstrap/js/jquery-3.3.1.slim.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script> --}}
  <script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ asset('vendor/animsition/js/animsition.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
  <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
  <script src="{{ asset('vendor/daterangepicker/moment.min.js') }}"></script>
  <script src="{{ asset('vendor/daterangepicker/daterangepicker.js') }}"></script>
  <script src="{{ asset('vendor/countdowntime/countdowntime.js') }}"></script>
  <script src="{{ asset('bootstrap/js/main.js') }}"></script>

  <div class="container">
    @yield('content')
  </div>
</body>

</html>
