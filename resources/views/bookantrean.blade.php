@extends('layouts.header')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="login100-form-title" style="background-image: url(/bootstrap/bg-02.jpg);">
                    @foreach($jadwal as $skedul)

					<span class="login100-form-title-1">
						Pendaftaran Antrean
					</span>
				</div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('konfirmasidaftar') }}" enctype="multipart/form-data">
                        @csrf




                        <div class="form-group row">
                            <label for="jenis_hewan" class="col-md-4 col-form-label text-md-right">Jenis Hewan</label>

                            <div class="col-md-6">
                                <select class="form-control @error('jenis_hewan') is-invalid @enderror" name="jenis_hewan" required autocomplete="jenis_hewan">
                                    <option value="">Pilih Jenis Hewan</option>
                                    <option value="Kucing" {{ $selected_jenis_hewan == 'Kucing' ? 'selected' : '' }}>Kucing</option>
                                    <option value="Anjing" {{ $selected_jenis_hewan == 'Anjing' ? 'selected' : '' }}>Anjing</option>
                                    <option value="Kambing">Kambing</option>
                                    <option value="Musang">Musang</option>
                                    <option value="Ayam">Ayam</option>
                                    <option value="Kura-kura">Kura-kura</option>
                                    <option value="Kelinci">Kelinci</option>
                                    <option value="lain-lain">lain-lain</option>
                                </select>
                                {{-- <input id="jenis_hewan" type="text" class="form-control @error('jenis_hewan') is-invalid @enderror" name="jenis_hewan"> --}}
                                @error('jenis_hewan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jumlah" class="col-md-4 col-form-label text-md-right">Keluhan</label>

                            <div class="col-md-6">
                                {{-- <input id="keluhan" type="number" class="form-control @error('keluhan') is-invalid @enderror" name="jumlah" value="{{ old('keluhan') }}" required autocomplete="keluhan"> --}}
                                <textarea  id="keluhan" class="form-control @error('jenis_hewan') is-invalid @enderror" rows="3" name="keluhan" required autocomplete="keluhan"></textarea>

                                @error('keluhan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="foto" class="col-md-4 col-form-label text-md-right">Foto Hewan</label>
                            <div class="col-md-6">
                                <input id="foto" type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" value="{{ old('foto') }}" required autocomplete="foto">
                                @error('foto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <input id="id_user" type="hidden" class="form-control @error('id_user') is-invalid @enderror" name="id_user" value="{{ Auth::user()->id }}" required autocomplete="id_user">
                        <input id="id_jadwal" type="hidden" class="form-control @error('id_jadwal') is-invalid @enderror" name="id_jadwal" value="{{ $skedul->id }}" required autocomplete="id_jadwal">
                        @endforeach

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
