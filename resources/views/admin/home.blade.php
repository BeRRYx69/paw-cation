@extends('admin.layouts.top')

@section('content')
    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
        <div class="container">

          <div class="text-center">
            <h3>Pets understand humans better than humans do</h3>
            <a class="cta-btn" href="{{ route('admin.jadwal.create') }}">Tambah Jadwal</a>
          </div>

        </div>
      </section><!-- End Cta Section -->
      <!-- ======= Services Section ======= -->

      <!-- ======= Services Section ======= -->

    <section id="services" class="services section-bg">
        <div class="container">
            <div class="row">
                {{-- <div class="col-lg-12 margin-tb">

                    <form method="get" action="/admin/home/search">
                        <div class="float-right my-2" style="margin-left:20px;">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>

                        <div class="float-right my-2">
                            <input type="search" name="search" class="form-control" id="cari" aria-describedby="search" >
                        </div>

                    </form> --}}
                {{-- </div> --}}
            </div>
        </br>
            {{-- @foreach(array_chunk($book, 2) as $chunk) --}}
            {{-- @foreach($book->chunk(3) as $chunk)

            <div class="row">
                @foreach ($chunk as $buku)

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" id="range">
                    <div class="icon-box">
                        <img src="{{asset('storage/'.$buku->foto)}}" width="150" style="margin-top:20px;">
                        <h4 style="padding:10px; font-size: 10px;"><a href="">{{ $buku->nama_buku }}</a></h4>
                            <h4>{{ $buku->penulis }}</h4>
                            <form action="{{ route('admin.buku.destroy',$buku->id) }}" method="POST">

                            <a href="{{ route('admin.buku.edit',$buku->id) }}"  class="btn btn-warning">Edit Buku</a>
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" onClick="return confirm('Are you sure you want to delete?')">Delete Buku</button>
                            </form>
                    </div>
                </div>
                @endforeach

            </div>
            @endforeach --}}
            @foreach($jadwal->chunk(4) as $chunk)

            <div class="row">
                @foreach ($chunk as $jadwal)

                <div class="col-lg-3 col-md-2 d-flex align-items-stretch"  id="range">
                    <div class="icon-box">
                        <div class="jumbotron">
                            <p class="atas" style="font-size: 24px">{{ date('F', strtotime($jadwal->jadwal_date)) }}</p>

                            <h1>{{ date('d', strtotime($jadwal->jadwal_date)) }}</h1>
                            <hr>
                            <p style="font-weight: bold; font-size:16px">{{ $jadwal->jam_sesi }}</p>
                            <p style="font-weight: bold; font-size:16px">Available {{ $jadwal->jumlah }}</p>


                          </div>
                          <form action="{{ route('admin.jadwal.destroy',$jadwal->id) }}" method="POST">

                            {{-- <a href="#"  class="btn btn-warning">Edit Buku</a> --}}
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" onClick="return confirm('Are you sure you want to delete?')">Hapus Jadwal</button>
                            </form>


                    </div>

                </div>
                @endforeach
          </div>
          @endforeach


        </div>

    </section><!-- End Services Section -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->


@endsection
