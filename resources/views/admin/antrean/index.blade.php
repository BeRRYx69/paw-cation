@extends('admin.layouts.header')

@section('content')
<section id="services">
    <div class="container">

        <div class="row">


        <div class="col-md-12">

            <div  class="content-box-large">

<div class="row">
    <div class="col-lg-12 margin-tb">

        <form method="get" action="/admin/daftarantrean/cari">
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
                <th>Foto</th>
                <th>Nama Pemesan</th>
                <th>Tanggal</th>
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
                <td><img width="200px" src="{{asset('storage/'.$antrean->foto)}}"></td>
                <td>{{ $antrean->user->name }}</td>
                <td>{{ $antrean->jadwal->jadwal_date }}</td>
                <td>{{ $antrean->jadwal->jam_sesi }}</td>
                <td>{{ $antrean->jenis_hewan }}</td>
                <td>{{ $antrean->keluhan }}</td>
                <td>{{ $antrean->status }}</td>
                <td>
                <form action="{{ route('admin.antrean.destroy', $antrean->id_antrean) }}" method="POST">

                @if($antrean->status === 'menunggu konfirmasi')

                <a class="btn btn-success" href="{{ route('admin.disetujui',$antrean->id_antrean) }}">Setujui</a>

                @else
                <a class="btn btn-info" href="{{ route('admin.selesai',$antrean->id_antrean) }}">Selesai</a>
                @endif
                </br>
            </br>
                @csrf
                @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            </td>
            </tr>
                @endforeach
            </table>
            </div>
        </div>
        </div>
{{-- <div class="d-flex">
    {{ $buku->links() }}
</div> --}}
@endsection
