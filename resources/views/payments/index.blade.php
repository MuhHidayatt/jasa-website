@extends('layouts.app')
@section('title', 'Riwayat Pembayaran')
@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 fw-bold text-gray-800">Riwayat Pembayaran</h1>
    </div>

    <!-- Search and Filter Card -->
    <div class="card shadow-sm mb-4 border-0">
        <div class="card-body p-3">
            <form action="{{ route('payments.index') }}" method="GET">
                <div class="row g-2">
                    <!-- Search Input -->
                    <div class="col-md-6">
                        <div class="input-group input-group-sm">
                            <input type="text" 
                                   class="form-control border-end-0" 
                                   id="search" 
                                   name="search" 
                                   placeholder="Cari berdasarkan nama customer atau kode pembayaran..." 
                                   value="{{ request('search') }}">
                            <button class="btn btn-outline-secondary border-start-0" type="submit">
                                <i class="fas fa-search fa-xs"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Sort Dropdown -->
                    <div class="col-md-3">
                        <select class="form-select form-select-sm" id="sort" name="sort">
                            <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Terbaru</option>
                            <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Terlama</option>
                            <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Nama (A-Z)</option>
                            <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Nama (Z-A)</option>
                        </select>
                    </div>

                    <!-- Filter Button -->
                    <div class="col-md-2 d-grid">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fas fa-filter me-1"></i> Filter
                        </button>
                    </div>

                    <!-- Reset Button -->
                    <div class="col-md-1 d-grid">
                        <a href="{{ route('payments.index') }}" 
                           class="btn btn-outline-secondary btn-sm" 
                           title="Reset Filter">
                            <i class="fas fa-sync-alt"></i>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabel Pembayaran -->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-sm text-center align-middle">
                    <thead class="table-light text-center">
                        <tr>
                            <th>No</th>
                            <th>Kode Pembayaran</th>
                            <th>Kode Order</th>
                            <th>Customer</th>
                            <th>Metode</th>
                            <th>Nominal</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @forelse ($payments as $payment)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><strong>{{ $payment->kode_payment }}</strong></td>
                            <td>{{ $payment->order->kode_order ?? '-' }}</td>
                            <td>{{ $payment->order->customer->name_customer ?? '-' }}</td>
                            <td>
                                <span class="badge bg-{{ $payment->method == 'transfer' ? 'primary' : 'secondary' }}">
                                    {{ ucfirst($payment->method) }}
                                </span>
                            </td>
                            <td class="text-success fw-semibold">
                                Rp {{ number_format($payment->amount, 0, ',', '.') }}
                            </td>
                            <td>{{ $payment->payment_date->format('d-m-Y') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">Belum ada pembayaran.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

