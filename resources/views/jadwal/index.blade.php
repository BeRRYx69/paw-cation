@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Pet Categories Section -->
    <div class="row justify-content-center mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body pet-categories py-4">
                    <div class="row justify-content-center">
                        <div class="col-6 col-md-3">
                            <a href="{{ route('booking.byjenis', ['jenis_hewan' => 'Anjing']) }}" class="pet-card">
                                <i class="fas fa-dog"></i>
                                <h5>Anjing</h5>
                            </a>
                        </div>
                        <div class="col-6 col-md-3">
                            <a href="{{ route('booking.byjenis', ['jenis_hewan' => 'Kucing']) }}" class="pet-card">
                                <i class="fas fa-cat"></i>
                                <h5>Kucing</h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jadwal Section -->
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Jadwal Klinik</h4>
                </div>

                <div class="card-body">
                    @if($jadwals->isEmpty())
                        <p class="text-center">Belum ada jadwal tersedia.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Jam</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($jadwals as $jadwal)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($jadwal->jadwal_date)->format('d F Y') }}</td>
                                            <td>{{ $jadwal->jam_sesi }}</td>
                                            <td>
                                                @if($jadwal->is_available)
                                                    <span class="badge bg-success">Tersedia</span>
                                                @else
                                                    <span class="badge bg-danger">Penuh</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($jadwal->is_available)
                                                    <a href="{{ route('booking.create', ['jadwal_id' => $jadwal->id]) }}" 
                                                       class="btn btn-primary btn-sm">
                                                        Booking
                                                    </a>
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

<!-- Add the required styles -->
<style>
    .pet-categories {
        background: #0088b3;
        border-radius: 0.25rem;
    }
    
    .pet-card {
        text-align: center;
        color: white;
        padding: 1rem;
        transition: all 0.3s ease;
        cursor: pointer;
        text-decoration: none;
        display: block;
    }
    
    .pet-card:hover {
        transform: translateY(-5px);
        color: white;
        text-decoration: none;
        background-color: #007399;
        border-radius: 10px;
    }
    
    .pet-card i {
        font-size: 2.5rem;
        margin-bottom: 0.5rem;
    }
    
    .pet-card h5 {
        font-size: 1rem;
        margin: 0;
        font-weight: 500;
        color: white;
    }
</style>
@endsection 