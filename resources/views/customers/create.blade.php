@extends('layouts.app')
@section('title', 'Tambah Customer')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h4 fw-bold text-gray-800">Tambah Customer Baru</h1>
        <a href="{{ route('customers.index') }}" class="btn btn-sm btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Kembali
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <form action="{{ route('customers.store') }}" method="POST">
                @csrf

                {{-- Nama Customer --}}
                <div class="mb-3">
                    <label for="name_customer" class="form-label">Nama Customer</label>
                    <input type="text" name="name_customer" id="name_customer"
                        class="form-control @error('name_customer') is-invalid @enderror"
                        value="{{ old('name_customer') }}" required>
                    @error('name_customer')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="mb-3">
                    <label for="email" class="form-label">Email (Opsional)</label>
                    <input type="email" name="email" id="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- No HP --}}
                <div class="mb-3">
                    <label for="phone" class="form-label">No. Telepon (Opsional)</label>
                    <input type="text" name="phone" id="phone"
                        class="form-control @error('phone') is-invalid @enderror"
                        value="{{ old('phone') }}">
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Alamat --}}
                <div class="mb-3">
                    <label for="address" class="form-label">Alamat (Opsional)</label>
                    <textarea name="address" id="address" rows="3"
                        class="form-control @error('address') is-invalid @enderror">{{ old('address') }}</textarea>
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tombol Simpan --}}
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Simpan Customer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
