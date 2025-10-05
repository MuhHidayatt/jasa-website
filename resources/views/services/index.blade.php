@extends('layouts.app')

@section('title', 'Service Management')
@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 fw-bold text-gray-800">Service Management</h1>
    </div>

    <!-- Search and Filter Card -->
    <div class="card shadow-sm mb-4 border-0">
        <div class="card-body p-3">
            <form action="{{ route('services.index') }}" method="GET">
                <div class="row g-2 align-items-stretch">

                    <!-- Add Client Button -->
                    <div class="col-md-2 d-flex">
                        <a href="{{ route('services.create') }}" class="btn btn-success btn-sm w-100 d-flex align-items-center justify-content-center">
                            <i class="fas fa-plus me-1"></i> Tambah Service
                        </a>
                    </div>

                    <!-- Search Input -->
                    <div class="col-md-5 d-flex">
                        <div class="input-group input-group-sm w-100 d-flex align-items-center">
                            <input type="text" 
                                   class="form-control border-end-0 h-100" 
                                   id="search" 
                                   name="search" 
                                   placeholder="Cari layanan berdasarkan nama atau kode..."
                                   value="{{ request('search') }}">
                            <button class="btn btn-outline-secondary border-start-0 h-100" type="submit">
                                <i class="fas fa-search fa-xs"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Sort Dropdown -->
                    <div class="col-md-2 d-flex">
                        <select class="form-select form-select-sm w-100" id="sort" name="sort">
                            <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Terbaru</option>
                            <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Terlama</option>
                            <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Nama (A-Z)</option>
                            <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Nama (Z-A)</option>
                        </select>
                    </div>

                    <!-- Filter Button -->
                    <div class="col-md-2 d-flex">
                        <button type="submit" class="btn btn-primary btn-sm w-100 d-flex align-items-center justify-content-center">
                            <i class="fas fa-filter me-1"></i> Filter
                        </button>
                    </div>

                    <!-- Reset Button -->
                    <div class="col-md-1 d-flex">
                        <a href="{{ route('services.index') }}" class="btn btn-outline-secondary btn-sm w-100 d-flex align-items-center justify-content-center" title="Reset Filter">
                            <i class="fas fa-sync-alt"></i>
                        </a>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <!-- Services Table Card -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered text-center align-middle">
                    <thead class="table-light">
                        <tr>
                            <th width="5%" class="text-center">No</th>
                            <th class="text-center">Kode Service</th>
                            <th class="text-center">Nama Service</th>
                            <th class="text-center">Harga</th>
                            <th class="text-center">Foto</th>
                            <th width="15%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($services as $service)
                        <tr>
                            <td class="text-center">{{ ($services->currentPage() - 1) * $services->perPage() + $loop->iteration }}</td>
                            <td class="text-center"><span class="badge bg-primary">{{ $service->kode_service }}</span></td>
                            <td class="text-center">{{ $service->name_service }}</td>
                            <td class="text-center">Rp {{ number_format($service->price, 0, ',', '.') }}</td>

                            <td class="text-center">
                                @if ($service->foto)
                                    <img src="{{ asset('storage/' . $service->foto) }}" alt="foto" width="150" class="img-thumbnail">
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="d-flex gap-2 justify-content-center">
                                    <a href="{{ route('services.show', $service->id) }}" 
                                       class="btn btn-sm btn-info" data-bs-toggle="tooltip" title="Lihat">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('services.edit', $service->id) }}" 
                                       class="btn btn-sm btn-warning" data-bs-toggle="tooltip" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('services.destroy', $service->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                                data-bs-toggle="tooltip" title="Hapus"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus service ini?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-4">Tidak ada data service ditemukan. 
                                <a href="{{ route('services.create') }}">Buat layanan baru</a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if ($services->hasPages())
            <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="text-muted text-center">
                    Menampilkan {{ $services->firstItem() }} sampai {{ $services->lastItem() }} dari {{ $services->total() }} data
                </div>
                <nav class="d-flex justify-content-center">
                    {{ $services->appends(request()->query())->links() }}
                </nav>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Initialize tooltips
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    })
</script>
@endpush
