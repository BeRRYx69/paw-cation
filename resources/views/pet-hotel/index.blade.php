@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Riwayat Booking Pet Hotel</span>
                    <a href="{{ route('pet-hotel.create') }}" class="btn btn-primary btn-sm">Booking Baru</a>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="d-flex justify-content-end mb-3">
                        <a href="{{ route('pet-hotel.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-1"></i> Booking Pet Hotel
                        </a>
                    </div>

                    @if($bookings->isEmpty())
                        <p class="text-center">Belum ada riwayat booking.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID Booking</th>
                                        <th>Nama Hewan</th>
                                        <th>Jenis</th>
                                        <th>Check-in</th>
                                        <th>Check-out</th>
                                        <th>Tipe Kamar</th>
                                        <th>Total Harga</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bookings as $booking)
                                        <tr>
                                            <td>#{{ $booking->id }}</td>
                                            <td>{{ $booking->pet_name }}</td>
                                            <td>{{ ucfirst($booking->pet_type) }}</td>
                                            <td>{{ $booking->check_in_date->format('d/m/Y') }}</td>
                                            <td>{{ $booking->check_out_date->format('d/m/Y') }}</td>
                                            <td>{{ ucfirst($booking->room_type) }}</td>
                                            <td>Rp. {{ number_format($booking->total_price, 0, ',', '.') }}</td>
                                            <td>
                                                <span class="badge bg-{{ $booking->status == 'confirmed' ? 'success' : 
                                                    ($booking->status == 'pending' ? 'warning' : 
                                                    ($booking->status == 'cancelled' ? 'danger' : 'info')) }}">
                                                    {{ ucfirst($booking->status) }}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{ route('pet-hotel.show', $booking) }}" class="btn btn-info btn-sm">Detail</a>
                                                @if($booking->status == 'pending')
                                                    <form action="{{ route('pet-hotel.cancel', $booking) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-danger btn-sm" 
                                                                onclick="return confirm('Apakah Anda yakin ingin membatalkan booking ini?')">
                                                            Batalkan
                                                        </button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 