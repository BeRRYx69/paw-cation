<html>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  {{-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="bootstrap/css/style.css">
  <link href="bootstrap/logoa.png" rel="icon"> --}}
  <link href="{{ asset('bootstrap/logo_kucing_dan_anjing') }}" rel="icon">
  <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('bootstrap/css/style.css') }}" rel="stylesheet">



  <!-- Template Main CSS File -->
  {{-- <link href="assets/css/style.css" rel="stylesheet"> --}}

  <link href="{{ asset('bootstrap/css/util.css') }}" rel="stylesheet">
  <link href="{{ asset('bootstrap/css/main.css') }}" rel="stylesheet">

  <title>SIBA</title>
</head>

<body>


  <nav class="navbar navbar-expand-lg navbar-default">
    <a class="navbar-brand" href="{{ route('welcome') }}">
    <img src="{{ asset('bootstrap/logo_kucing_dan_anjing') }}" width="150" height="40" class="d-inline-block align-top" alt="SIBA Logo">

  </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <div class="mr-auto"></div>
      <ul class="navbar-nav my-2 my-lg-0">
        @guest
        @if (Route::has('admin.login'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.login') }}">{{ __('Login') }}</a>
            </li>
        @endif

        @if (Route::has('admin.register'))
            <li class="nav-item">
                {{-- <a class="nav-link" href="{{ route('admin.register') }}">{{ __('Register') }}</a> --}}
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
  </nav>
  @guest
  @if (Route::has('login'))
    </br>

     @endif

     @else
    {{-- <section id="cta" class="cta">
        <div class="container">
      <div class="text-center">
            <h3>CHOOSE YOUR BOOK</h3>
            <p><b>List Book</b></p>
          </div>
        </div>
         </section> --}}
     @endguest

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    {{-- <script src="bootstrap/js/jquery-3.3.1.slim.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script> --}}
    <script src="{{ asset('bootstrap/js/jquery-3.3.1.slim.min.js') }}" defer></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}" defer></script>

    <div class="container">
        @yield('content')
    </div>
  </body>

  </html>
