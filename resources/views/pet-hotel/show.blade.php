@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Detail Booking #{{ $petHotel->id }}</span>
                    <a href="{{ route('pet-hotel.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
                </div>

                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Status:</div>
                        <div class="col-md-8">
                            <span class="badge bg-{{ $petHotel->status == 'confirmed' ? 'success' : 
                                ($petHotel->status == 'pending' ? 'warning' : 
                                ($petHotel->status == 'cancelled' ? 'danger' : 'info')) }}">
                                {{ ucfirst($petHotel->status) }}
                            </span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Nama Hewan:</div>
                        <div class="col-md-8">{{ $petHotel->pet_name }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Jenis Hewan:</div>
                        <div class="col-md-8">{{ ucfirst($petHotel->pet_type) }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Ras/Breed:</div>
                        <div class="col-md-8">{{ $petHotel->pet_breed ?? '-' }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Umur:</div>
                        <div class="col-md-8">{{ $petHotel->pet_age }} tahun</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Check-in:</div>
                        <div class="col-md-8">{{ $petHotel->check_in_date->format('d/m/Y') }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Check-out:</div>
                        <div class="col-md-8">{{ $petHotel->check_out_date->format('d/m/Y') }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Durasi Menginap:</div>
                        <div class="col-md-8">{{ $petHotel->check_in_date->diffInDays($petHotel->check_out_date) }} hari</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Tipe Kamar:</div>
                        <div class="col-md-8">{{ ucfirst($petHotel->room_type) }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Total Harga:</div>
                        <div class="col-md-8">Rp. {{ number_format($petHotel->total_price, 0, ',', '.') }}</div>
                    </div>

                    @if($petHotel->special_notes)
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Catatan Khusus:</div>
                        <div class="col-md-8">{{ $petHotel->special_notes }}</div>
                    </div>
                    @endif

                    @if($petHotel->status == 'pending')
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <form action="{{ route('pet-hotel.cancel', $petHotel) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-danger" 
                                            onclick="return confirm('Apakah Anda yakin ingin membatalkan booking ini?')">
                                        Batalkan Booking
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 