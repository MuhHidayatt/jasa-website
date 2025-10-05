@extends('layouts.app')
@section('title', 'Tambah Layanan')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h4 fw-bold text-gray-800">Tambah Layanan Baru</h1>
        <a href="{{ route('services.index') }}" class="btn btn-sm btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Kembali
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Nama Layanan --}}
                <div class="mb-3">
                    <label for="name_service" class="form-label">Nama Layanan</label>
                    <input type="text" name="name_service" id="name_service" 
                        class="form-control @error('name_service') is-invalid @enderror" 
                        value="{{ old('name_service') }}" required>
                    @error('name_service')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Deskripsi --}}
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea name="description" id="description" rows="4"
                        class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Harga --}}
                <div class="mb-3">
                    <label for="price" class="form-label">Harga (Rp)</label>
                    <input type="number" name="price" id="price" 
                        class="form-control @error('price') is-invalid @enderror" 
                        value="{{ old('price') }}" required min="0">
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Foto --}}
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto (opsional)</label>
                    <input type="file" name="foto" id="foto" 
                        class="form-control @error('foto') is-invalid @enderror" accept="image/*">
                    @error('foto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tombol Simpan --}}
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Simpan Layanan
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
