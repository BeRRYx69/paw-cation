<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAWCATION - Sistem Informasi Booking Antrian</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('bootstrap/logo_anjing_dan_kucing.png') }}">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/icons/animal-icons.css') }}">
    
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
            background-color: #ffffff;
        }
        
        .navbar {
            background-color: transparent;
            position: absolute;
            width: 100%;
            z-index: 1000;
            padding: 1rem 2rem;
        }
        
        .navbar-brand {
            color: white !important;
            font-weight: 600;
        }
        
        .navbar-brand img {
            height: 40px;
            margin-right: 10px;
        }
        
        .nav-link {
            color: white !important;
            font-weight: 500;
            margin-left: 20px;
            transition: color 0.3s ease;
        }
        
        .nav-link:hover {
            color: rgba(255,255,255,0.8) !important;
        }
        
        .hero-section {
            position: relative;
            height: 100vh;
            background: url('{{ asset('assets/img/cat-background.jpg') }}') center/cover;
            display: flex;
            align-items: center;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
        }
        
        .hero-content {
            position: relative;
            z-index: 1;
            color: white;
            padding: 2rem;
        }
        
        .hero-text h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: white;
        }
        
        .hero-text p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            color: white;
            font-weight: bold;
        }
        
        .pet-categories {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: #0088b3;
            padding: 0rem 0;
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
        }
        
        @media (max-width: 991.98px) {
            .hero-text {
                text-align: center;
            }
            
            .pet-categories {
                position: relative;
            }
        }
    </style>
</head>
<body>
    @php
        $isLogin = Auth::check();
    @endphp

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('bootstrap/logo_anjing_dan_kucing.png') }}" alt="PAWCATION Logo">
                PAWCATION
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/jadwal') }}">List Jadwal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center hero-content">
                <div class="col-lg-6">
                    <div class="hero-text">
                        <h1>Welcome to PAWCATION</h1>
                        <p>Your healthy animal will be healthy</p>
                        <div class="hero-buttons">
                            <a href="{{ route('login') }}" class="btn btn-primary btn-lg me-3">Login</a>
                            <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg">Register Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Scripts -->
    <script src="{{ asset('bootstrap/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html> 