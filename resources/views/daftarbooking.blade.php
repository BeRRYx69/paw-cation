@extends('layouts.appdaftarbooking')

@section('content')
<section id="services">
    <div class="container">

        <div class="row">


        <div class="col-md-12">

            <div  class="content-box-large">

<div class="row">
    <div class="col-lg-12 margin-tb">

        <form method="get" action="#">
        <form method="get" action="/search">
            <div class="float-left my-2" style="margin-right:20px;">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>

            <div class="float-left my-2">
                <input type="search" name="search" class="form-control" id="cari" aria-describedby="search" >
            </div>

        </form>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

            <table class="table table-bordered">
                <thead class="thead">
                <tr>
                <th>Id</th>
                <th>foto</th>
                <th>Nama Pemesan</th>
                <th>Tanggal Check-Up</th>
                <th>Waktu</th>
                <th>Jenis Hewan</th>
                <th>Keluhan</th>
                <th>Status</th>
                <th>Action</th>
            </thead>

                </tr>
                @foreach ($book as $antrean)
                <tr>
                <td>{{ $antrean->id_antrean }}</td>
                <td><img width="150px" src="{{asset('storage/'.$antrean->foto)}}"></td>
                <td>{{ $antrean->user->name }}</td>
                <td>{{ $antrean->jadwal->jadwal_date }}</td>
                <td>{{ $antrean->jadwal->jam_sesi }}</td>
                <td>{{ $antrean->jenis_hewan }}</td>
                <td>{{ $antrean->keluhan }}</td>
                <td>{{ $antrean->status }}</td>
                <td>
                @if($antrean->status === 'menunggu konfirmasi')

                <form action="{{ route('batalkan', [$antrean->id_antrean, $antrean->id_jadwal]) }}" method="POST">


                @csrf
                @method('DELETE')
            <button type="submit" class="btn btn-danger">Batalkan</button>

                @elseif ($antrean->status === 'Disetujui')
                <a class="btn btn-success" href="{{ route('viewpdf', $antrean->id_antrean) }}">CETAK</a>

            </form>

                 @endif
                </td>

            </div>
            </tr>
                @endforeach
            </table>
            </div>
        </div>
        </div>
{{-- <div class="d-flex">
    {{ $antrean->links() }}
</div> --}}
@endsection
