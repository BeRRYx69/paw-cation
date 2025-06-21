@extends('layouts.auth')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="auth-card">
            <div class="auth-header">
                <img src="{{ asset('bootstrap/logo_anjing_dan_kucing.png') }}" height="60" alt="SIBA Logo">
                <h1 class="auth-title">Daftar</h1>
            </div>

            <div class="auth-body">
                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <!-- Social Register Buttons -->
                <a href="{{ route('social.login', 'google') }}" class="btn btn-light btn-auth w-100 mb-3">
                    <i class="fab fa-google me-2"></i>
                    Daftar dengan Google
                </a>

                <a href="{{ route('social.login', 'facebook') }}" class="btn btn-primary btn-auth w-100 mb-3">
                    <i class="fab fa-facebook-f me-2"></i>
                    Daftar dengan Facebook
                </a>

                <div class="text-center text-muted my-4">
                    <span>atau daftar dengan email</span>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus 
                                placeholder="Masukkan nama lengkap Anda">
                        </div>
                        @error('name')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                name="email" value="{{ old('email') }}" required autocomplete="email"
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
                                name="password" required autocomplete="new-password"
                                placeholder="Masukkan password">
                        </div>
                        @error('password')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password-confirm" class="form-label">Konfirmasi Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input id="password-confirm" type="password" class="form-control" 
                                name="password_confirmation" required autocomplete="new-password"
                                placeholder="Masukkan ulang password">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="alamat" class="form-label">Alamat</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-home"></i></span>
                            <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" 
                                name="alamat" value="{{ old('alamat') }}" required 
                                placeholder="Masukkan alamat Anda">
                        </div>
                        @error('alamat')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="no_hp" class="form-label">Nomor HP</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            <input id="no_hp" type="tel" class="form-control @error('no_hp') is-invalid @enderror" 
                                name="no_hp" value="{{ old('no_hp') }}" required 
                                placeholder="Masukkan nomor HP Anda">
                        </div>
                        @error('no_hp')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                            <select id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" 
                                name="jenis_kelamin" required>
                                <option value="">Pilih jenis kelamin</option>
                                <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        @error('jenis_kelamin')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-auth w-100">
                        <i class="fas fa-user-plus me-2"></i> Daftar
                    </button>
                </form>
            </div>

            <div class="auth-footer">
                <p class="mb-0">Sudah punya akun? 
                    <a href="{{ route('login') }}" class="text-primary text-decoration-none">Masuk sekarang</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
