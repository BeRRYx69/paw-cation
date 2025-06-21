@extends('layouts.auth')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="auth-card">
            <div class="auth-header">
                <img src="{{ asset('bootstrap/logo_anjing_dan_kucing.png') }}" height="60" alt="SIBA Logo">
                <h1 class="auth-title">Login</h1>
            </div>

            <div class="auth-body">
                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <!-- Social Login Buttons -->
                <a href="{{ route('social.login', 'google') }}" class="btn btn-light btn-auth w-100 mb-3">
                    <i class="fab fa-google me-2"></i>
                    Lanjutkan dengan Google
                </a>

                <a href="{{ route('social.login', 'facebook') }}" class="btn btn-primary btn-auth w-100 mb-3">
                    <i class="fab fa-facebook-f me-2"></i>
                    Lanjutkan dengan Facebook
                </a>

                <div class="text-center text-muted my-4">
                    <span>atau login dengan email</span>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus 
                                placeholder="Masukkan email Anda">
                        </div>
                        @error('email')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                name="password" required autocomplete="current-password" 
                                placeholder="Masukkan password Anda">
                        </div>
                        @error('password')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" 
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    Ingat Saya
                                </label>
                            </div>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-primary text-decoration-none">
                                    Lupa Password?
                                </a>
                            @endif
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-auth w-100">
                        <i class="fas fa-sign-in-alt me-2"></i> Masuk
                    </button>
                </form>
            </div>

            <div class="auth-footer">
                <p class="mb-0">Belum punya akun? 
                    <a href="{{ route('register') }}" class="text-primary text-decoration-none">Daftar sekarang</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
