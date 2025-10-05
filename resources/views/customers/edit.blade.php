@extends('layouts.app')
@section('title', 'Edit Customer')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h4 fw-bold text-gray-800">Edit Data Customer</h1>
        <a href="{{ route('customers.index') }}" class="btn btn-sm btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Kembali
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <form action="{{ route('customers.update', $customer->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Kode Customer --}}
                <div class="mb-3">
                    <label for="kode_customer" class="form-label">Kode Customer</label>
                    <input type="text" name="kode_customer" id="kode_customer"
                        class="form-control @error('kode_customer') is-invalid @enderror"
                        value="{{ old('kode_customer', $customer->kode_customer) }}" required>
                    @error('kode_customer')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Nama Customer --}}
                <div class="mb-3">
                    <label for="name_customer" class="form-label">Nama Customer</label>
                    <input type="text" name="name_customer" id="name_customer"
                        class="form-control @error('name_customer') is-invalid @enderror"
                        value="{{ old('name_customer', $customer->name_customer) }}" required>
                    @error('name_customer')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="mb-3">
                    <label for="email" class="form-label">Email (Opsional)</label>
                    <input type="email" name="email" id="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email', $customer->email) }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- No HP --}}
                <div class="mb-3">
                    <label for="phone" class="form-label">No. Telepon (Opsional)</label>
                    <input type="text" name="phone" id="phone"
                        class="form-control @error('phone') is-invalid @enderror"
                        value="{{ old('phone', $customer->phone) }}">
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Alamat --}}
                <div class="mb-3">
                    <label for="address" class="form-label">Alamat (Opsional)</label>
                    <textarea name="address" id="address" rows="3"
                        class="form-control @error('address') is-invalid @enderror">{{ old('address', $customer->address) }}</textarea>
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tombol Simpan --}}
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
