<html>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link href="{{ asset('bootstrap/logo_kucing_dan_anjing.png') }}" rel="icon">
  <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('bootstrap/css/style.css') }}" rel="stylesheet">



  <!-- Template Main CSS File -->
  {{-- <link href="assets/css/style.css" rel="stylesheet"> --}}
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

  <link href="{{ asset('bootstrap/css/util.css') }}" rel="stylesheet">
  <link href="{{ asset('bootstrap/css/main.css') }}" rel="stylesheet">

  <title>SIBA</title>
</head>
<body>


  <nav class="navbar navbar-expand-lg navbar-default">
    <a class="navbar-brand" href="{{ route('admin.home') }}">
        <img src="{{ asset('bootstrap/logo_kucing_dan_anjing.png') }}" height="40" alt="SIBA Logo">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <div class="mr-auto"></div>
      <ul class="navbar-nav my-2 my-lg-0">
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.home')}}" style="font-size:18px; color:white; font-weight: bold;">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.listantrean')}}" style="font-size:18px; color:white; font-weight: bold;">Daftar Antrean</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.user.index')}}" style="font-size:18px; color:white; font-weight: bold;">User</a>
        </li>
        <li class="nav-item dropdown">
          <a  class="nav-link dropdown-toggle" href="#" style="font-size:18px; color:white; font-weight: bold;" id="navbarDropdown"data-display="static" data-toggle="dropdown" aria-haspopup="true" >
          Profile
        </a>
          <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="navbarDropdown">
            <h6 class="dropdown-header">Your Account  {{ Auth::user()->name }}</h6>
            <a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </div>
        </li>

      </ul>

      </div>
  </nav>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    {{-- <script src="bootstrap/js/jquery-3.3.1.slim.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script> --}}
    <script src="{{ asset('bootstrap/js/jquery-3.3.1.slim.min.js') }}" defer></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}" defer></script>

    <!--extends -->
    @yield('content')
    <!--extends -->

</body>
</html>
