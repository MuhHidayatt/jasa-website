@extends('layouts.app')

@section('title', 'Edit Service')
@section('content')
<div class="container">
    <h1 class="mb-4">Edit Service</h1>

    <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name_service" class="form-label">Nama Service</label>
            <input type="text" name="name_service" id="name_service" 
                   class="form-control @error('name_service') is-invalid @enderror" 
                   value="{{ old('name_service', $service->name_service) }}" required>
            @error('name_service')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" id="description" rows="4" 
                      class="form-control @error('description') is-invalid @enderror">{{ old('description', $service->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Harga (Rp)</label>
            <input type="number" name="price" id="price" 
                   class="form-control @error('price') is-invalid @enderror" 
                   value="{{ old('price', $service->price) }}" required>
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        @if ($service->foto)
            <div class="mb-3">
                <label class="form-label">Foto Lama</label><br>
                <img src="{{ asset('storage/' . $service->foto) }}" alt="Foto Service" width="150">
            </div>
        @endif

        <div class="mb-3">
            <label for="foto" class="form-label">Foto Baru (Opsional)</label>
            <input type="file" name="foto" id="foto" 
                   class="form-control @error('foto') is-invalid @enderror">
            @error('foto')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('services.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
