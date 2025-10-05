@extends('layouts.app')

@section('title', 'Detail Service')
@section('content')
<div class="container">
    <h1 class="mb-4">Detail Service</h1>

    <div class="card shadow">
        <div class="card-body">
            <h4 class="card-title">{{ $service->name_service }}</h4>
            <p class="card-text"><strong>Kode:</strong> {{ $service->kode_service }}</p>
            <p class="card-text"><strong>Deskripsi:</strong> {{ $service->description ?? '-' }}</p>
            <p class="card-text"><strong>Harga:</strong> Rp {{ number_format($service->price, 0, ',', '.') }}</p>
            

            @if ($service->foto)
                <div class="mb-3">
                    <strong>Foto:</strong><br>
                    <img src="{{ asset('storage/' . $service->foto) }}" alt="Foto Service" width="200">
                </div>
            @endif

            <a href="{{ route('services.index') }}" class="btn btn-secondary">Kembali</a>
            <a href="{{ route('services.edit', $service->id) }}" class="btn btn-warning">Edit</a>
        </div>
    </div>
</div>
@endsection
