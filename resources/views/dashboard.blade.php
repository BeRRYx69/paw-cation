@extends('layouts.app')

@section('content')
<style>
    :root {
        --primary-color: #00a8e8;
        --secondary-color: #b5446e;
        --dark-color: #333333;
    }

    .navbar-custom {
        background-color: var(--primary-color);
        padding: 1rem 0;
    }

    .navbar-custom .navbar-brand {
        color: white;
        font-size: 24px;
        font-weight: 600;
        display: flex;
        align-items: center;
    }

    .navbar-custom .navbar-brand img {
        height: 40px;
        margin-right: 10px;
    }

    .navbar-custom .nav-link {
        color: white !important;
        margin-left: 20px;
        font-weight: 500;
    }

    .hero-section {
        background: url('{{ asset("assets/img/cat-background.jpg") }}') no-repeat center center;
        background-size: cover;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        position: relative;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(
            135deg,
            rgba(0, 168, 232, 0.95) 0%,
            rgba(0, 168, 232, 0.85) 100%
        );
    }

    .hero-content {
        position: relative;
        z-index: 2;
        color: white;
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }

    .hero-title {
        font-size: 48px;
        font-weight: 700;
        margin-bottom: 20px;
        color: white;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    }

    .hero-subtitle {
        font-size: 24px;
        margin-bottom: 15px;
        color: white;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
    }

    .hero-text {
        font-size: 18px;
        margin-bottom: 40px;
        color: white;
        line-height: 1.6;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
    }

    .animal-icons {
        display: flex;
        justify-content: center;
        gap: 100px;
        margin-top: 50px;
    }

    .animal-card {
        text-align: center;
        background: rgba(255, 255, 255, 0.15);
        padding: 30px;
        border-radius: 15px;
        backdrop-filter: blur(10px);
        transition: transform 0.3s ease, background 0.3s ease;
        width: 150px;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .animal-card:hover {
        transform: translateY(-10px);
        background: rgba(255, 255, 255, 0.25);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .animal-icon {
        font-size: 64px;
        margin-bottom: 15px;
    }

    .animal-icon img {
        width: 64px;
        height: 64px;
        filter: brightness(0) invert(1);
    }

    .animal-name {
        font-size: 20px;
        color: white;
        margin: 0;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
    }

    .btn-lihat-jadwal {
        background-color: white;
        color: #00a8e8;
        padding: 15px 40px;
        border-radius: 30px;
        font-size: 18px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        margin-top: 40px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .btn-lihat-jadwal:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        text-decoration: none;
        color: #0088cc;
        background-color: rgba(255, 255, 255, 0.95);
    }

    .btn-lihat-jadwal i {
        margin-right: 10px;
    }

    .category-section {
        padding: 0;
        margin-top: -100px;
    }

    .category-container {
        display: flex;
        width: 100%;
        margin: 0;
        padding: 0;
    }

    .category-card {
        flex: 1;
        text-align: center;
        padding: 40px 20px;
        color: white;
        position: relative;
        transition: all 0.3s ease;
        min-height: 200px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .category-card:hover {
        transform: translateY(-5px);
    }

    .category-card .icon {
        font-size: 48px;
        margin-bottom: 15px;
    }

    .category-card h3 {
        font-size: 18px;
        margin: 0;
        font-weight: 500;
    }

    .category-card.dog { background-color: #28a745; }
    .category-card.cat { background-color: #8B4513; }
    .category-card.small-animals { background-color: #00CED1; }
    .category-card.fish { background-color: #4169E1; }
    .category-card.birds { background-color: #9370DB; }
    .category-card.horse { background-color: #CD5C5C; }

    .btn-custom {
        padding: 10px 25px;
        border-radius: 25px;
        font-weight: 500;
        text-transform: uppercase;
        margin: 5px;
        transition: all 0.3s ease;
        border: 2px solid white;
    }

    .btn-login {
        background-color: transparent;
        color: white;
    }

    .btn-register {
        background-color: white;
        color: var(--primary-color);
    }

    .btn-custom:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        text-decoration: none;
    }

    .counter {
        position: absolute;
        top: 10px;
        left: 10px;
        background: rgba(255,255,255,0.2);
        padding: 5px 10px;
        border-radius: 15px;
        font-size: 14px;
    }

    .location-section {
        position: relative;
        z-index: 2;
        margin-top: 50px;
        text-align: center;
    }

    .map-container {
        width: 100%;
        max-width: 800px;
        margin: 20px auto;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .map-frame {
        width: 100%;
        height: 400px;
        border: none;
    }

    .btn-location {
        background-color: #00a8e8;
        color: white;
        padding: 12px 30px;
        border-radius: 30px;
        font-size: 16px;
        font-weight: 500;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        margin-top: 20px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .btn-location:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        text-decoration: none;
        color: white;
        background-color: #0088cc;
    }

    .btn-location i {
        margin-right: 10px;
    }

    .location-title {
        color: white;
        font-size: 24px;
        margin-bottom: 20px;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
    }
</style>

<section class="hero-section">
    <div class="hero-content">
        <h1 class="hero-title">Selamat Datang di PAWCATION</h1>
        <h2 class="hero-subtitle">Sistem Informasi Booking Antrian Klinik Hewan</h2>
        <p class="hero-text">Pilih jadwal yang tersedia untuk memeriksa kesehatan hewan kesayangan Anda</p>
        
        <div class="animal-icons">
            <div class="animal-card">
                <div class="animal-icon">
                    <img src="{{ asset('bootstrap/icons/dog-icon.png') }}" alt="Anjing">
                </div>
                <h3 class="animal-name">Anjing</h3>
            </div>
            <div class="animal-card">
                <div class="animal-icon">
                    <img src="{{ asset('bootstrap/icons/cat-icon.png') }}" alt="Kucing">
                </div>
                <h3 class="animal-name">Kucing</h3>
            </div>
        </div>

        <a href="{{ route('jadwal.index') }}" class="btn-lihat-jadwal">
            <i class="fas fa-calendar-alt"></i>
            Lihat Jadwal
        </a>

        <!-- Tambahan Section Lokasi -->
        <div class="location-section">
            <h3 class="location-title">Lokasi Klinik</h3>
            <div class="map-container">
                <iframe class="map-frame" 
                    src="https://maps.google.com/maps?q=-6.190457,106.885754&z=17&output=embed"
                    allowfullscreen>
                </iframe>
            </div>
            <a href="https://maps.google.com/maps?q=-6.190457,106.885754" 
               target="_blank" 
               class="btn-location">
                <i class="fas fa-map-marker-alt"></i>
                Buka di Google Maps
            </a>
        </div>
    </div>
</section>

<!-- Categories Section -->
<section class="category-section">
    <div class="category-container">
        <div class="category-card dog">
            <span class="counter">1</span>
            <span class="icon icon-dog"></span>
            <h3>Dog</h3>
        </div>
        <div class="category-card cat">
            <span class="icon icon-cat"></span>
            <h3>Cat</h3>
        </div>
        <div class="category-card small-animals">
            <span class="icon icon-small-animal"></span>
            <h3>Small Animals</h3>
        </div>
        <div class="category-card fish">
            <span class="icon icon-fish"></span>
            <h3>Fish</h3>
        </div>
        <div class="category-card birds">
            <span class="icon icon-bird"></span>
            <h3>Birds</h3>
        </div>
        <div class="category-card horse">
            <span class="icon icon-horse"></span>
            <h3>Horse & Farm</h3>
        </div>
    </div>
</section>
@endsection 