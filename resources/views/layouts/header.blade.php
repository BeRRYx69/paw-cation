<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistem Informasi Booking Antrian Klinik Hewan">
    
    <title>PAWCATION - Sistem Informasi Booking Antrian</title>
    
    <!-- Favicon -->
    <link href="{{ asset('bootstrap/logo_anjing_dan_kucing.png') }}" rel="icon">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="{{ asset('bootstrap/css/style.css') }}" rel="stylesheet">
    
    @stack('styles')
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('bootstrap/logo_anjing_dan_kucing.png') }}" height="40" class="d-inline-block align-top" alt="PAWCATION Logo">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" href="{{ route('home') }}">
                            <i class="fas fa-home me-1"></i> Beranda
                        </a>
                    </li>

                    @auth
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('daftarantrean') ? 'active' : '' }}" 
                           href="{{ route('daftarantrean') }}">
                            <i class="fas fa-history me-1"></i> Riwayat Antrian
                        </a>
                    </li>
                    @endauth

                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('rule') ? 'active' : '' }}" href="{{ route('rule') }}">
                            <i class="fas fa-info-circle me-1"></i> Peraturan
                        </a>
                    </li>

                    @auth
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('pet-hotel*') ? 'active' : '' }}" href="{{ route('pet-hotel.index') }}">
                            <i class="fas fa-hotel me-1"></i> Pet Hotel
                        </a>
                    </li>
                    @endauth

                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" 
                           id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=random" 
                                 class="rounded-circle me-2" width="32" height="32" alt="Profile">
                            <span>{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user me-2"></i> Profil Saya
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}" 
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt me-2"></i> Keluar
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt me-1"></i> Masuk
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">
                            <i class="fas fa-user-plus me-1"></i> Daftar
                        </a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-4" style="margin-top: 76px;">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer bg-light py-4 mt-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-3 mb-lg-0">
                    <img src="{{ asset('bootstrap/logo_anjing_dan_kucing.png') }}" height="30" alt="PAWCATION Logo">
                    <p class="text-muted mb-0 mt-2">
                        Sistem Informasi Booking Antrian Klinik Hewan
                    </p>
                </div>
                <div class="col-lg-6 text-center text-lg-end">
                    <p class="text-muted mb-0">
                        © {{ date('Y') }} PAWCATION. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        // Aktivasi Tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });

        // Navbar Scroll Effect
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                document.querySelector('.navbar').classList.add('navbar-scrolled');
            } else {
                document.querySelector('.navbar').classList.remove('navbar-scrolled');
            }
        });
    </script>

    @stack('scripts')
</body>
</html>

@push('styles')
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa;
    }

    /* Navbar Styles */
    .navbar {
        transition: all 0.3s ease;
    }

    .navbar-scrolled {
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .navbar .nav-link {
        color: rgba(255, 255, 255, 0.9) !important;
        font-weight: 500;
        padding: 0.5rem 1rem;
        transition: all 0.3s ease;
    }

    .navbar .nav-link:hover,
    .navbar .nav-link.active {
        color: #ffffff !important;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 0.5rem;
    }

    .navbar .dropdown-menu {
        border: none;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        border-radius: 0.5rem;
    }

    .navbar .dropdown-item {
        padding: 0.5rem 1.5rem;
        transition: all 0.3s ease;
    }

    .navbar .dropdown-item:hover {
        background-color: #f8f9fa;
        color: #0d6efd;
    }

    /* Footer Styles */
    .footer {
        border-top: 1px solid #dee2e6;
    }

    /* Custom Container Width */
    @media (min-width: 1400px) {
        .container {
            max-width: 1320px;
        }
    }

    /* Animation */
    .nav-link, .dropdown-item {
        position: relative;
        overflow: hidden;
    }

    .nav-link::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        width: 0;
        height: 2px;
        background: #ffffff;
        transition: all 0.3s ease;
        transform: translateX(-50%);
    }

    .nav-link:hover::after {
        width: 50%;
    }
</style>
@endpush
