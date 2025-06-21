<html>
    <head>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <style>
            body
            {
                background:#00bcd4;
            }

            h1
            {
                color:#fff;
                margin:40px 0 60px 0;
                font-weight:300;
            }

            .our-team-main
            {
                width:100%;
                height:auto;
                border-bottom:5px #323233 solid;
                background:#fff;
                text-align:center;
                border-radius:10px;
                overflow:hidden;
                position:relative;
                transition:0.5s;
                margin-bottom:28px;
            }


            .our-team-main img
            {
                border-radius:50%;
                margin-bottom:20px;
                width: 85px;
            }

            .our-team-main h3
            {
                font-size:20px;
                font-weight:700;
            }

            .our-team-main p
            {
                margin-bottom:0;
            }

            .team-back
            {
                width:100%;
                height:auto;
                position:absolute;
                top:0;
                left:0;
                padding:5px 15px 0 15px;
                text-align:left;
                background:#fff;

            }

            .team-front
            {
                width:100%;
                height: 200px;
                position:relative;
                z-index:10;
                background:#fff;
                padding:15px;
                bottom:0px;
                transition: all 0.5s ease;
            }

            .our-team-main:hover .team-front
            {
                bottom:-200px;
                transition: all 0.5s ease;
            }

            .our-team-main:hover
            {
                border-color:#777;
                transition:0.5s;
            }


        </style>
    </head>
    <body>
        @extends('layouts.appdaftarbooking')
        @section('content')
    </br>
        <h1 class="text-center">Syarat & Ketentuan Klink Hewan</h1>


</br>

        <div class="container">
        <div class="row">

        <!--team-1-->
        <div class="col-lg-6">
        <div class="our-team-main">

        <div class="team-front">
            <img src="{{ asset('bootstrap/sibahom2e.png') }}" width="25" height="25" class="img-fluid" />
        <h3>Booking Rules</h3>

        </div>

        <div class="team-back">
        <span>
            <ol>
               <li style="list-style: auto; margin-left: 10px;">Setelah melakukan booking antrean, pendaftar akan menunggu status disetujui agar dapat mencetak ticket antrean.</li>
                <li style="list-style: auto; margin-left: 10px;">Ticket antrean digunakan sebagai bukti bahwa pendaftar benar-benar sudah mendaftar secara online.</li>
                <li style="list-style: auto; margin-left: 10px;">Pendaftar wajib datang dengan membawa bukti ticket pendaftaran yang telah disetujui.</li>
                <li style="list-style: auto; margin-left: 10px;">Pendaftar wajib datang ke klink sesuai jadwal tanggal yang tertera pada tiket, bila tidak maka tiket dianggap tidak berlaku.</li>
            </ol>
        </span>
        </div>

        </div>
        </div>
        <!--team-1-->

        <!--team-2-->
        <div class="col-lg-6">
        <div class="our-team-main">

        <div class="team-front">
            <img src="{{ asset('bootstrap/sibahom2e.png') }}" width="30" height="30" class="img-fluid" />
            <h3>Waktu Operasional</h3>
        </div>

        <div class="team-back">
        <span>
            <ol>
            <li style="list-style: auto; margin-left: 10px;"> Pendaftaran online dibuka setiap hari kerja Senin s/d Jumat (Tanggal Merah Libur). </li>
            <li style="list-style: auto; margin-left: 10px;">Klinik hewan buka setiap hari kerja Senin s/d Jumat (Tanggal Merah Libur) pada Jam 08.00-15.00. </li>
            <li style="list-style: auto; margin-left: 10px;">Waktu check-up dibagi menjadi 2 sesi. Siang pada jam 08.00 - 11.00 dan pagi pada jam 12.00 - 15.00. </li>
            </ol>
        </span>
        </div>

        </div>
        </div>
        <!--team-2-->




        </div>
        </div>
        @endsection

    </body>
</html>
