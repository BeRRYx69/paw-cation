<html>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link href="{{ asset('bootstrap/logoa.png') }}" rel="icon">
  <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('bootstrap/css/style.css') }}" rel="stylesheet">

  <!-- Favicon -->
  <link href="{{ asset('bootstrap/logo_kucing_dan_anjing') }}" rel="icon">

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
    <img src="{{ asset('bootstrap/logo_kucing_dan_anjing') }}" width="150" height="40" class="d-inline-block align-top" alt="SIBA Logo">
  </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <div class="mr-auto"></div>
      <ul class="navbar-nav my-2 my-lg-0">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.home') }}" style="font-size:18px; color:white; font-weight: bold;">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.listantrean') }}" style="font-size:18px; color:white; font-weight: bold;">Daftar Antrean</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.user.index')}}" style="font-size:18px; color:white; font-weight: bold;">User</a>
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
