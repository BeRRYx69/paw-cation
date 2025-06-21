@extends('layouts.header')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center position-relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="position-absolute w-100 h-100" style="background: url('{{ asset('assets/img/cat-background.jpg') }}') center/cover; opacity: 0.1;"></div>
    
    <div class="container position-relative">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4 animate__animated animate__fadeInUp">Selamat Datang di PAWCATION</h1>
                <h2 class="h4 mb-4 animate__animated animate__fadeInUp animate__delay-1s">Sistem Informasi Booking Antrian Klinik Hewan</h2>
                <p class="lead mb-5 animate__animated animate__fadeInUp animate__delay-2s">Pilih jadwal yang tersedia untuk memeriksa kesehatan hewan kesayangan Anda</p>
                <div class="pet-cards animate__animated animate__fadeInUp animate__delay-3s">
                    <a href="{{ route('jadwal') }}" class="pet-card">
                        <i class="fas fa-stethoscope fa-3x mb-3"></i>
                        <h5>Pet Klinik</h5>
                    </a>
                    <a href="{{ route('pet-hotel.create') }}" class="pet-card">
                        <i class="fas fa-hotel fa-3x mb-3"></i>
                        <h5>Pet Hotel</h5>
                    </a>
                </div>
                <div class="mt-5 animate__animated animate__fadeInUp animate__delay-4s">
                    <a href="#jadwal" class="btn btn-light btn-lg rounded-pill px-5">
                        <i class="fas fa-calendar-alt me-2"></i>Lihat Jadwal
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ======= Jadwal Section ======= -->
<section id="jadwal" class="jadwal section-bg py-5">
        <div class="container">
        <div class="section-title text-center mb-5">
            <h2 class="fw-bold">Jadwal Tersedia</h2>
            <p class="text-muted">Pilih waktu yang sesuai untuk pemeriksaan hewan kesayangan Anda</p>
          </div>

        <!-- Real-time Clock -->
        <div class="text-center mb-4">
            <div class="current-time h4 mb-2">
                <i class="far fa-clock me-2"></i><span id="current-time"></span>
            </div>
            <div class="current-date text-muted">
                <span id="current-date"></span>
            </div>
        </div>

        <!-- Filter Jadwal -->
        <div class="jadwal-filter mb-4">
            <div class="row justify-content-center">
                <div class="col-md-4 mb-3">
                    <div class="input-group">
                        <span class="input-group-text bg-primary text-white">
                            <i class="fas fa-calendar"></i>
                        </span>
                        <input type="month" class="form-control" id="filterBulan" 
                               value="{{ date('Y-m') }}" onchange="filterJadwal()">
                    </div>
                </div>
            </div>
        </div>

        <!-- Calendar View -->
        <div class="calendar-container mb-4">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="calendar-header d-flex justify-content-between align-items-center mb-3">
                        <h4 class="current-month mb-0"></h4>
                        <div class="calendar-nav">
                            <button class="btn btn-sm btn-outline-primary me-2" onclick="prevMonth()">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-primary" onclick="nextMonth()">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                    <div class="calendar-grid">
                        <div class="calendar-days bg-light rounded p-3 mb-4">
                            <div class="row text-center">
                                <div class="col">Min</div>
                                <div class="col">Sen</div>
                                <div class="col">Sel</div>
                                <div class="col">Rab</div>
                                <div class="col">Kam</div>
                                <div class="col">Jum</div>
                                <div class="col">Sab</div>
                            </div>
                        </div>
                        <div id="calendarBody"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jadwal Cards -->
        <div class="jadwal-cards mt-4">
            <div class="row g-4" id="jadwalContainer">
        @foreach($jadwal->chunk(4) as $chunk)
            @foreach ($chunk as $jadwal)
                    <div class="col-lg-3 col-md-6 jadwal-item" 
                         data-date="{{ date('Y-m-d', strtotime($jadwal->jadwal_date)) }}">
                        <div class="card h-100 jadwal-card border-0 shadow-sm">
                            <div class="card-body text-center">
                                <div class="date-badge mb-3">
                                    <div class="month">{{ date('F', strtotime($jadwal->jadwal_date)) }}</div>
                                    <div class="day display-4 fw-bold">{{ date('d', strtotime($jadwal->jadwal_date)) }}</div>
                                    <div class="year text-muted">{{ date('Y', strtotime($jadwal->jadwal_date)) }}</div>
                                </div>
                                <div class="time-slot mb-3">
                                    <h5 class="card-title">
                                        <i class="far fa-clock me-2"></i>{{ $jadwal->jam_sesi }}
                                    </h5>
                                </div>
                                <div class="availability mb-4">
                                    @if($jadwal->jumlah >= 1)
                                        <span class="badge bg-success">
                                            <i class="fas fa-user-check me-1"></i>
                                            Tersedia {{ $jadwal->jumlah }} slot
                                        </span>
                                    @else
                                        <span class="badge bg-danger">
                                            <i class="fas fa-user-times me-1"></i>
                                            Tidak tersedia
                                        </span>
                                    @endif
                      </div>
                                @if($jadwal->jumlah >= 1)
                                    <button type="button" 
                                            class="btn btn-primary w-100 rounded-pill book-btn"
                                            onclick="showBookingModal('{{ $jadwal->id }}', '{{ date('d F Y', strtotime($jadwal->jadwal_date)) }}', '{{ $jadwal->jam_sesi }}')">
                                        <i class="fas fa-calendar-check me-2"></i>Pilih Jadwal
                                    </button>
                                @else
                                    <button class="btn btn-secondary w-100 rounded-pill" disabled>
                                        <i class="fas fa-calendar-times me-2"></i>Slot Penuh
                                    </button>
                      @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- ======= Lokasi Section ======= -->
<section id="lokasi" class="lokasi py-5">
    <div class="container">
        <div class="section-title text-center mb-5">
            <h2 class="fw-bold">Lokasi Klinik</h2>
            <p class="text-muted">Kunjungi klinik kami di lokasi berikut</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="map-container rounded-4 shadow-sm overflow-hidden mb-4">
                    <iframe 
                        src="https://maps.google.com/maps?q=-6.190457,106.885754&z=17&output=embed"
                        width="100%" 
                        height="450" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                <div class="text-center">
                    <a href="https://maps.google.com/maps?q=-6.190457,106.885754" 
                       target="_blank" 
                       class="btn btn-primary btn-lg rounded-pill px-5">
                        <i class="fas fa-map-marker-alt me-2"></i>
                        Buka di Google Maps
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Booking Modal -->
<div class="modal fade" id="bookingModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title">Konfirmasi Jadwal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <div class="confirmation-icon mb-4">
                    <i class="fas fa-calendar-check fa-4x text-primary"></i>
                </div>
                <h4 class="mb-3">Anda akan mendaftar untuk:</h4>
                <p class="selected-date mb-2"></p>
                <p class="selected-time mb-4"></p>
                <form id="bookingForm" action="" method="POST">
                    @csrf
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary rounded-pill px-5">
                            <i class="fas fa-check me-2"></i>Konfirmasi Booking
                        </button>
                        <a href="{{ route('daftarantrean') }}" class="btn btn-outline-primary rounded-pill px-5">
                            <i class="fas fa-history me-2"></i>Lihat Riwayat Antrian
                        </a>
                    </div>
                </form>
      </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="row justify-content-center mb-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body pet-categories py-4">
                    <div class="row justify-content-center">
                        <div class="col-6 col-md-3">
                            <a href="{{ route('jadwal') }}" class="pet-card">
                                <i class="fas fa-stethoscope"></i>
                                <h5>Pet Klinik</h5>
                            </a>
                        </div>
                        <div class="col-6 col-md-3">
                            <a href="{{ route('pet-hotel.create') }}" class="pet-card">
                                <i class="fas fa-hotel"></i>
                                <h5>Pet Hotel</h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<style>
    #hero {
        background: linear-gradient(135deg, #00B4DB, #0083B0);
        color: white;
        padding: 100px 0;
        min-height: 100vh;
    }

    #hero h1 {
        font-size: 48px;
        font-weight: 700;
        margin-bottom: 20px;
        animation: fadeInUp 1s ease;
    }

    #hero h2 {
        font-size: 24px;
        margin-bottom: 30px;
        animation: fadeInUp 1s ease 0.2s;
        animation-fill-mode: both;
    }

    #hero p {
        font-size: 18px;
        animation: fadeInUp 1s ease 0.4s;
        animation-fill-mode: both;
    }

    .pet-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 20px;
        max-width: 600px;
        margin: 0 auto;
    }

    .pet-card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 30px 20px;
        color: white;
        transition: all 0.3s ease;
    }

    .pet-card:hover {
        transform: translateY(-10px);
        background: rgba(255, 255, 255, 0.2);
    }

    .pet-card i {
        color: rgba(255, 255, 255, 0.9);
    }

    .pet-card h5 {
        margin: 0;
        font-weight: 600;
    }

    .jadwal-card {
        transition: all 0.3s ease;
        border-radius: 15px;
        overflow: hidden;
    }

    .jadwal-card:hover {
        transform: translateY(-5px);
    }

    .date-badge {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 10px;
    }

    .date-badge .month {
        color: #0083B0;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 14px;
    }

    .date-badge .day {
        color: #343a40;
        line-height: 1;
    }

    @media (max-width: 991.98px) {
        #hero {
            padding: 60px 0;
            text-align: center;
        }

        .pet-cards {
            margin-top: 40px;
        }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .jadwal-filter .input-group-text {
        border: none;
    }

    .jadwal-filter .form-control {
        border-left: none;
    }

    .calendar-container {
        background: white;
        border-radius: 15px;
        padding: 20px;
        box-shadow: 0 0 15px rgba(0,0,0,0.05);
    }

    .calendar-days {
        font-weight: 600;
    }

    .calendar-date {
        cursor: pointer;
        transition: all 0.3s ease;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: auto;
        position: relative;
    }

    .calendar-date.past {
        color: #ccc;
        cursor: not-allowed;
    }

    .calendar-date.has-schedule {
        border: 2px solid #0d6efd;
    }

    .calendar-date.has-schedule.available {
        background-color: rgba(13, 110, 253, 0.1);
    }

    .calendar-date.active {
        background-color: #0d6efd;
        color: white;
        border-color: #0d6efd;
    }

    .calendar-date:not(.past):hover {
        background-color: rgba(13, 110, 253, 0.2);
        transform: scale(1.1);
    }

    .book-btn {
        transition: all 0.3s ease;
    }

    .book-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(13, 110, 253, 0.2);
    }

    .badge {
        padding: 8px 12px;
        font-weight: 500;
    }

    /* Animasi untuk jadwal cards */
    .jadwal-item {
        display: none;
    }

    .jadwal-item.animate__fadeInUp {
        display: block;
    }

    /* Additional styles for real-time clock */
    .current-time {
        font-size: 2rem;
        font-weight: 600;
        color: #0d6efd;
    }

    .current-date {
        font-size: 1.2rem;
    }

    /* Modal styles */
    .modal-content {
        border: none;
        border-radius: 15px;
    }

    .confirmation-icon {
        animation: bounce 2s infinite;
    }

    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% {
            transform: translateY(0);
        }
        40% {
            transform: translateY(-20px);
        }
        60% {
            transform: translateY(-10px);
        }
    }

    /* Tambahkan animasi untuk transisi jadwal */
    .animate__fadeInUp {
        animation-duration: 0.5s;
    }

    /* Lokasi Section Styles */
    .lokasi {
        background-color: #f8f9fa;
    }

    .map-container {
        position: relative;
        padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
        height: 0;
    }

    .map-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: none;
    }

    .btn-primary {
        background: linear-gradient(135deg, #00B4DB, #0083B0);
        border: none;
        padding: 12px 30px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

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
@endpush

@push('scripts')
<script>
let currentDate = new Date();
let selectedDate = null;

function updateCalendar() {
    const year = currentDate.getFullYear();
    const month = currentDate.getMonth();
    
    // Update header
    document.querySelector('.current-month').textContent = 
        new Date(year, month).toLocaleDateString('id-ID', { month: 'long', year: 'numeric' });
    
    const firstDay = new Date(year, month, 1);
    const lastDay = new Date(year, month + 1, 0);
    
    let calendarHTML = '<div class="row g-2">';
    
    // Add empty cells for days before first day of month
    for (let i = 0; i < firstDay.getDay(); i++) {
        calendarHTML += '<div class="col"><div class="calendar-date empty"></div></div>';
    }
    
    // Add days of month
    for (let day = 1; day <= lastDay.getDate(); day++) {
        const date = new Date(year, month, day);
        const dateString = date.toISOString().split('T')[0];
        const hasSchedule = document.querySelector(`.jadwal-item[data-date="${dateString}"]`) !== null;
        const isActive = selectedDate && selectedDate.toDateString() === date.toDateString();
        const isPast = date < new Date().setHours(0,0,0,0);
        
        calendarHTML += `
            <div class="col">
                <div class="calendar-date ${hasSchedule ? 'has-schedule' : ''} 
                                        ${isActive ? 'active' : ''} 
                                        ${isPast ? 'past' : ''}"
                     data-date="${dateString}">
                    ${day}
                </div>
            </div>`;
    }
    
    calendarHTML += '</div>';
    document.getElementById('calendarBody').innerHTML = calendarHTML;

    // Tambahkan event listener untuk setiap tanggal
    document.querySelectorAll('.calendar-date').forEach(dateElement => {
        if (!dateElement.classList.contains('empty') && !dateElement.classList.contains('past')) {
            dateElement.addEventListener('click', () => {
                const dateString = dateElement.dataset.date;
                if (dateString) {
                    selectDate(dateString);
                }
            });
        }
    });

    // Highlight tanggal yang memiliki jadwal
    document.querySelectorAll('.calendar-date.has-schedule').forEach(date => {
        if (!date.classList.contains('past')) {
            date.classList.add('available');
        }
    });
}

function selectDate(dateString) {
    const date = new Date(dateString);
    const now = new Date();
    now.setHours(0, 0, 0, 0);
    
    // Jangan lanjutkan jika tanggal sudah lewat
    if (date < now) {
        return;
    }
    
    // Update selected date
    selectedDate = date;
    
    // Jika tanggal yang dipilih berbeda bulan, update currentDate
    if (selectedDate.getMonth() !== currentDate.getMonth()) {
        currentDate = new Date(selectedDate);
    }
    
    // Update tampilan kalender
    updateCalendar();
    
    // Sembunyikan semua jadwal
    document.querySelectorAll('.jadwal-item').forEach(item => {
        item.style.display = 'none';
        item.classList.remove('animate__fadeInUp');
    });
    
    // Tampilkan jadwal untuk tanggal yang dipilih dengan animasi
    const targetItems = document.querySelectorAll(`.jadwal-item[data-date="${dateString}"]`);
    if (targetItems.length > 0) {
        targetItems.forEach((item, index) => {
            setTimeout(() => {
                item.style.display = 'block';
                item.classList.add('animate__fadeInUp');
            }, index * 100);
        });
        
        // Scroll ke jadwal yang ditampilkan
        setTimeout(() => {
            targetItems[0].scrollIntoView({ 
                behavior: 'smooth', 
                block: 'center' 
            });
        }, 200);
    }
}

function prevMonth() {
    currentDate.setMonth(currentDate.getMonth() - 1);
    updateCalendar();
    showJadwalForMonth();
}

function nextMonth() {
    currentDate.setMonth(currentDate.getMonth() + 1);
    updateCalendar();
    showJadwalForMonth();
}

function showJadwalForMonth() {
    const year = currentDate.getFullYear();
    const month = currentDate.getMonth();
    
    // Sembunyikan semua jadwal
    document.querySelectorAll('.jadwal-item').forEach(item => {
        const itemDate = new Date(item.dataset.date);
        if (itemDate.getFullYear() === year && itemDate.getMonth() === month) {
            item.style.display = 'block';
            item.classList.add('animate__fadeInUp');
        } else {
            item.style.display = 'none';
            item.classList.remove('animate__fadeInUp');
        }
    });
}

function filterJadwal() {
    const filterValue = document.getElementById('filterBulan').value;
    const [filterYear, filterMonth] = filterValue.split('-');
    
    // Update currentDate untuk kalender
    currentDate = new Date(filterYear, parseInt(filterMonth) - 1);
    
    // Update kalender
    updateCalendar();
    
    // Filter jadwal
    document.querySelectorAll('.jadwal-item').forEach(item => {
        const itemDate = new Date(item.dataset.date);
        if (itemDate.getFullYear() == filterYear && itemDate.getMonth() + 1 == filterMonth) {
            item.style.display = 'block';
            item.classList.add('animate__fadeInUp');
        } else {
            item.style.display = 'none';
            item.classList.remove('animate__fadeInUp');
        }
    });
}

// Real-time clock function
function updateClock() {
    const now = new Date();
    const timeString = now.toLocaleTimeString('id-ID', { 
        hour: '2-digit', 
        minute: '2-digit',
        second: '2-digit'
    });
    const dateString = now.toLocaleDateString('id-ID', { 
        weekday: 'long', 
        year: 'numeric', 
        month: 'long', 
        day: 'numeric'
    });
    
    document.getElementById('current-time').textContent = timeString;
    document.getElementById('current-date').textContent = dateString;
}

// Booking modal function
function showBookingModal(jadwalId, date, time) {
    const modal = document.getElementById('bookingModal');
    const bookingForm = document.getElementById('bookingForm');
    
    // Update modal content
    modal.querySelector('.selected-date').textContent = date;
    modal.querySelector('.selected-time').textContent = time;
    
    // Update form action
    bookingForm.action = `/daftar-antrian/${jadwalId}`;
    
    // Show modal
    new bootstrap.Modal(modal).show();
    
    // Add form submit handler
    bookingForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        try {
            const response = await fetch(this.action, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    jadwal_id: jadwalId
                })
            });
            
            if (response.ok) {
                // Redirect ke halaman riwayat antrian setelah booking berhasil
                window.location.href = '{{ route("daftarantrean") }}';
            } else {
                throw new Error('Booking gagal');
            }
        } catch (error) {
            alert('Terjadi kesalahan saat melakukan booking. Silakan coba lagi.');
        }
    });
}

// Initialize everything when document is ready
document.addEventListener('DOMContentLoaded', function() {
    updateCalendar();
    updateClock();
    setInterval(updateClock, 1000);
    
    // Add animation delay to jadwal cards
    document.querySelectorAll('.jadwal-item').forEach((item, index) => {
        item.style.animationDelay = `${index * 0.1}s`;
    });

    // Set initial month view
    showJadwalForMonth();
});
</script>
@endpush
@endsection
