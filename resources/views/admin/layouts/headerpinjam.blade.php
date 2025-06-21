<html>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link href="{{ asset('bootstrap/logoa.png') }}" rel="icon">
  <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('bootstrap/css/style.css') }}" rel="stylesheet">



  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">


  <link href="{{ asset('bootstrap/css/util.css') }}" rel="stylesheet">
  <link href="{{ asset('bootstrap/css/main.css') }}" rel="stylesheet">

  <!------date------>
  <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
  <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
  <link href="{{ asset('datepick/date.css') }}" rel="stylesheet">

  <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
  <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
  <script type='text/javascript' src="{{ asset('datepick/date.js') }}" defer></script>

</head>
<body oncontextmenu='return false' class='snippet-body'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap-responsive.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.js"></script>
  <!------date------>

  <title>SIBA</title>
</head>
<body>


  <nav class="navbar navbar-expand-lg navbar-default">
    <a class="navbar-brand" href="{{ route('home') }}">
    <img src="{{asset('bootstrap/sibahome.png')}}" width="150" height="40" class="d-inline-block align-top" alt="">

  </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <div class="mr-auto"></div>
      <ul class="navbar-nav my-2 my-lg-0">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}" style="font-size:18px; color:white; font-weight: bold;">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.pinjam') }}" style="font-size:18px; color:white; font-weight: bold;">Daftar Antrean</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.member') }}" style="font-size:18px; color:white; font-weight: bold;">Member</a>
        </li>


      </ul>

      </div>
  </nav>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    {{-- <script src="bootstrap/js/jquery-3.3.1.slim.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script> --}}
    {{-- <script src="{{ asset('bootstrap/js/jquery-3.3.1.slim.min.js') }}" defer></script> --}}
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}" defer></script>




    <!--extends -->
    @yield('content')
    {{-- <!--extends -->
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script> --}}
    {{-- <script src="{{ asset('datepick/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('datepick/jquery.min.js') }}" defer></script> --}}


</body>
</html>
