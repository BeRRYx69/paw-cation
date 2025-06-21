<html>
    <head>
        <title>SIBA</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="an
            onymous">
            <script src="https://code.jquery.com/jquery3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">

                    <h2 class="m-3">KLINIK HEWAN SIBA</h2>


                    <h3 class="m-3"><strong>DETAIL BOOKING ANTREAN</strong></h3>
                </div>
                <div class="col-12">
                    <p class="m-1"><strong>Nama &nbsp;&nbsp;&nbsp;:</strong> {{ $antrean->user->name }}</p>
                    <p class="m-1"><strong>No HP&nbsp;&nbsp; :</strong> {{ $antrean->user->no_hp }}</p>
                    <p class="m-1"><strong>Alamat&nbsp;&nbsp;:</strong> {{ $antrean->user->alamat }}</p>
                </br>
                </div>

                <div class="col-12">
                    <table class="table table-bordered">
                        <tr>
                            <th>Id Antrean</th>
                            <th>Jenis Hewan</th>
                            <th>Keluhan</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                        </tr>
                        {{-- @foreach ($mahasiswa as $matakuliah) --}}
                            <tr>
                                {{-- <td><img width="100px" src="{{asset('storage/'.$antrean->book->foto)}}"></td> --}}
                                <td>{{ $antrean->id_antrean }}</td>
                                <td>{{ $antrean->jenis_hewan }}</td>
                                <td>{{ $antrean->keluhan }}</td>
                                <td>{{ $antrean->jadwal->jadwal_date }}</td>
                                <td>{{ $antrean->jadwal->jam_sesi }}</td>
                            </tr>
                        {{-- @endforeach --}}
                    </table>
                    <p style="font-style: italic; font-weight: bold;">*Dimohon untuk hadir ke klink sesuai dengan jadwal yang ditentukan dan ketentuan aturan waktu(siang 08:00-11:00 & pagi 12:00-15:00), Terima Kasih.</p>

                    <a class="btn btn-danger" href="{{ route('cetak', $antrean->id_antrean) }}">CETAK PDF</a>
                    {{-- <a class="btn btn-warning" href="{{ route('daftarantrean', [$antrean->id_antrean, $antrean->id_book]) }}">KEMBALI</a> --}}

                </div>
            </div>
        </div>
    </body>
</html>

