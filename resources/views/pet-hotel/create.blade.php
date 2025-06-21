@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Booking Pet Hotel</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('pet-hotel.store') }}">
                        @csrf

                        <div class="form-group row mb-3">
                            <label class="col-md-4 col-form-label text-md-right">Jenis Hewan</label>
                            <div class="col-md-6">
                                <select name="pet_type" class="form-control @error('pet_type') is-invalid @enderror" required {{ isset($pet_type) ? 'disabled' : '' }}>
                                    <option value="">Pilih Jenis Hewan</option>
                                    <option value="dog" {{ (old('pet_type', $pet_type ?? '') == 'dog') ? 'selected' : '' }}>Anjing</option>
                                    <option value="cat" {{ (old('pet_type', $pet_type ?? '') == 'cat') ? 'selected' : '' }}>Kucing</option>
                                </select>
                                @if(isset($pet_type))
                                    <input type="hidden" name="pet_type" value="{{ $pet_type }}">
                                @endif
                                @error('pet_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-4 col-form-label text-md-right">Nama Hewan</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('pet_name') is-invalid @enderror" 
                                       name="pet_name" value="{{ old('pet_name') }}" required>
                                @error('pet_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-4 col-form-label text-md-right">Ras/Breed</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('pet_breed') is-invalid @enderror" 
                                       name="pet_breed" value="{{ old('pet_breed') }}">
                                @error('pet_breed')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-4 col-form-label text-md-right">Umur (tahun)</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control @error('pet_age') is-invalid @enderror" 
                                       name="pet_age" value="{{ old('pet_age') }}" required min="0">
                                @error('pet_age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-4 col-form-label text-md-right">Tanggal Check-in</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control @error('check_in_date') is-invalid @enderror" 
                                       name="check_in_date" value="{{ old('check_in_date') }}" required min="{{ date('Y-m-d') }}">
                                @error('check_in_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-4 col-form-label text-md-right">Tanggal Check-out</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control @error('check_out_date') is-invalid @enderror" 
                                       name="check_out_date" value="{{ old('check_out_date') }}" required min="{{ date('Y-m-d', strtotime('+1 day')) }}">
                                @error('check_out_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-4 col-form-label text-md-right">Tipe Kamar</label>
                            <div class="col-md-6">
                                <select name="room_type" class="form-control @error('room_type') is-invalid @enderror" required>
                                    <option value="">Pilih Tipe Kamar</option>
                                    <option value="standard" {{ old('room_type') == 'standard' ? 'selected' : '' }}>Standard - Rp. 100.000/hari</option>
                                    <option value="deluxe" {{ old('room_type') == 'deluxe' ? 'selected' : '' }}>Deluxe - Rp. 150.000/hari</option>
                                    <option value="premium" {{ old('room_type') == 'premium' ? 'selected' : '' }}>Premium - Rp. 200.000/hari</option>
                                </select>
                                @error('room_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-4 col-form-label text-md-right">Catatan Khusus</label>
                            <div class="col-md-6">
                                <textarea class="form-control @error('special_notes') is-invalid @enderror" 
                                          name="special_notes">{{ old('special_notes') }}</textarea>
                                @error('special_notes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Buat Booking
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 