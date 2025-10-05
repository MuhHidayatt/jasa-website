@extends('layouts.auth')

@section('auth-content')
<div class="auth-card" data-aos="fade-up">
    <h2>Login</h2>
    <form action="{{ route('auth.login.proses') }}" method="POST">
        @csrf
        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Kata Sandi" required>
        </div>
        <button type="submit" class="btn btn-primary ripple">Masuk</button>
        <div class="text-center mt-3">
            <a href="{{ route('auth.register') }}" class="btn-link">Belum punya akun? Daftar</a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                timer: 2500,
                showConfirmButton: false,
                background: 'var(--primary-50)'
            });
        </script>
    @endif

    @if(session('failed') || session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ session('failed') ?? session('error') }}',
                timer: 2500,
                showConfirmButton: false
            });
        </script>
    @endif
@endpush
