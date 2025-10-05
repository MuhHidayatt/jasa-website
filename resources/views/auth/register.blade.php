@extends('layouts.auth')

@section('auth-content')
<div class="auth-card" data-aos="fade-up">
    <h2>Register</h2>
    <form action="{{ route('auth.register') }}" method="POST">
        @csrf
        <div class="mb-3">
            <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" required>
        </div>
        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Kata Sandi" required>
        </div>
        <div class="mb-3">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Kata Sandi" required>
        </div>
        <button type="submit" class="btn btn-primary ripple">Daftar</button>
        <div class="text-center mt-3">
            <a href="{{ route('auth.login') }}" class="btn-link">Sudah punya akun? Login</a>
        </div>
    </form>
</div>

<script>
    document.querySelector('form').addEventListener('submit', (e) => {
        e.preventDefault();
        Swal.fire({
            title: 'Pendaftaran Berhasil!',
            text: 'Akun Anda telah dibuat.',
            icon: 'success',
            timer: 2000,
            background: 'var(--primary-50)'
        }).then(() => {
            e.target.submit();
        });
    });
</script>
@endsection