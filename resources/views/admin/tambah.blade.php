@extends('admin.layouts.header')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="login100-form-title" style="background-image: url(/bootstrap/bg-02.jpg);">
					<span class="login100-form-title-1">
						Tambah Jadwal
					</span>
				</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.jadwal.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="jadwal_date"  class="col-md-4 col-form-label text-md-right">Tanggal Jadwal</label>

                            <div class="col-md-6">
                                        <input class="form-control @error('jadwal_date') is-invalid @enderror" name="jadwal_date" type="date" placeholder="yyyy-mm-dd" value="{{ old('jadwal_date') }}" required autocomplete="jadwal_date" autofocus>

                                        {{-- <input class="form-control @error('tanggal_date') is-invalid @enderror" name="tanggal_date" type="text" placeholder="dd-mm-yyyy" value="{{ old('tanggal_date') }}" required autocomplete="tanggal_date" autofocus> --}}
                                    </div>
                                @error('tanggal_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jam_sesi" class="col-md-4 col-form-label text-md-right">Waktu Sesi</label>

                            <div class="col-md-6">
                                <select name="jam_sesi" class="form-control">
                                    <option value="Pagi">Pagi</option>
                                    <option value="Siang">Siang</option>

                                    </select>
                                @error('jam_sesi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jumlah" class="col-md-4 col-form-label text-md-right">Jumlah</label>

                            <div class="col-md-6">
                                <input id="jumlah" type="number" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" value="{{ old('jumlah') }}" required autocomplete="jumlah">

                                @error('jumlah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </br>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
