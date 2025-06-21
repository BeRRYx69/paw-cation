<html>
    <head>
        <title>SIBA</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="an
            onymous">
            <script src="https://code.jquery.com/jquery3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            <style type="text/css">
                table tr td,
                table tr th{
                font-size: 9pt;
                }
                </style>
    </head>

    <body>

        <h2 style="text-align: center">KLINIK HEWAN SIBA</h2>
        <h3 style="text-align: center"><strong>DETAIL BOOKING ANTREAN</strong></h3>

            <table border="0" style="font-weight:bold;">
                <tr>

                    <td width="50">Nama</td>
                    <td>: {{ $antrean->user->name }}</td>
                </tr>
                <tr>
                    <td width="50">No HP</td>
                    <td>: {{ $antrean->user->no_hp }} </td>
               </tr>
               <tr>
                    <td width="50">Alamat</td>
                    <td>: {{ $antrean->user->alamat }}</td>
                </tr>
            </table>
        </br>
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
                                <td>{{ $antrean->id_antrean }}</td>
                                <td>{{ $antrean->jenis_hewan }}</td>
                                <td>{{ $antrean->keluhan }}</td>
                                <td>{{ $antrean->jadwal->jadwal_date }}</td>
                                <td>{{ $antrean->jadwal->jam_sesi }}</td>
                            </tr>
                        {{-- @endforeach --}}
                    </table>
                    <p style="font-style: italic; font-weight: bold;">*Dimohon untuk hadir ke klink sesuai dengan jadwal yang ditentukan dan ketentuan aturan waktu(siang 08:00-11:00 & pagi 12:00-15:00), Terima Kasih.</p>

    </body>
</html>

