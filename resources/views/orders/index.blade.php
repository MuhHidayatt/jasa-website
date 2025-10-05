@extends('layouts.app')
@section('title', 'Daftar Order')
@section('content')
<div class="container-fluid">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 fw-bold text-gray-800">Order Management</h1>
    </div>

    <!-- Search, Filter, and Cetak Laporan -->
    <div class="card shadow-sm mb-4 border-0">
        <div class="card-body p-3">
            <form action="{{ route('orders.index') }}" method="GET">
                <div class="row g-2 align-items-stretch">

                    <!-- Tombol Tambah Order -->
                    <div class="col-md-2">
                        <a href="{{ route('orders.create') }}" class="btn btn-success btn-sm w-100 h-100 d-flex align-items-center justify-content-center">
                            <i class="fas fa-plus me-1"></i> Tambah Order
                        </a>
                    </div>

                    <!-- Pencarian -->
                    <div class="col-md-3">
                        <div class="input-group input-group-sm h-100">
                            <input type="text" name="search" class="form-control border-end-0 h-100"
                                placeholder="Cari berdasarkan nama/kode..."
                                value="{{ request('search') }}">
                            <button class="btn btn-outline-secondary border-start-0 h-100" type="submit">
                                <i class="fas fa-search fa-xs"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Urutan -->
                    <div class="col-md-2">
                        <select name="sort" class="form-select form-select-sm h-100">
                            <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Terbaru</option>
                            <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Terlama</option>
                            <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Nama (A-Z)</option>
                            <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Nama (Z-A)</option>
                        </select>
                    </div>

                    <!-- Filter Status -->
                    <div class="col-md-2">
                        <select name="status" class="form-select form-select-sm h-100">
                            <option value="">Semua Status</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="paid" {{ request('status') == 'paid' ? 'selected' : '' }}>Paid</option>
                            <option value="done" {{ request('status') == 'done' ? 'selected' : '' }}>Done</option>
                        </select>
                    </div>

                    <!-- Tombol Filter -->
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-primary btn-sm w-100 h-100">
                            <i class="fas fa-filter me-1"></i> Filter
                        </button>
                    </div>

                    <!-- Tombol Reset -->
                    <div class="col-md-1">
                        <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary btn-sm w-100 h-100 d-flex align-items-center justify-content-center" title="Reset Filter">
                            <i class="fas fa-sync-alt"></i>
                        </a>
                    </div>

                   <!-- Tombol Cetak PDF -->
                    <div class="col-md-1">
                        <a href="{{ route('orders.report.pdf', ['status' => request('status')]) }}" target="_blank" 
                            class="btn btn-danger btn-sm w-100 h-100 d-flex align-items-center justify-content-center">
                            <i class="fas fa-file-pdf me-1"></i> Cetak Laporan
                        </a>
                    </div>


                </div>
            </form>
        </div>
    </div>


    <!-- Tabel Order -->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Kode Order</th>
                            <th>Customer</th>
                            <th>Jenis</th>
                            <th>Layanan / Request</th>
                            <th>Tanggal Order</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><strong>{{ $order->kode_order }}</strong></td>
                            <td>{{ $order->customer->name_customer }}</td>
                            <td>{{ $order->is_custom ? 'Custom' : 'Standar' }}</td>
                            <td>{{ $order->is_custom ? $order->custom_request : ($order->service->name_service ?? '-') }}</td>
                            <td>{{ $order->order_date->format('d-m-Y') }}</td>
                            <td>
                                <span class="badge bg-{{ $order->status == 'done' ? 'success' : ($order->status == 'paid' ? 'primary' : 'warning') }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex flex-wrap gap-2 justify-content-center">
                                    <!-- Detail -->
                                    <a href="{{ route('orders.show', $order->id) }}" 
                                       class="btn btn-sm btn-outline-info" data-bs-toggle="tooltip" title="Lihat Detail">
                                        <i class="fas fa-eye me-1"></i> Detail
                                    </a>
                                    

                                    <!-- Bayar -->
                                    @if($order->status === 'pending')
                                        <a href="{{ route('payments.create', $order->id) }}" 
                                           class="btn btn-sm btn-outline-success" data-bs-toggle="tooltip" title="Lakukan Pembayaran">
                                            <i class="fas fa-money-bill-wave me-1"></i> Bayar
                                        </a>

                                   @elseif($order->status === 'paid')
                                        <form action="{{ route('orders.markDone', $order->id) }}" method="POST" onsubmit="return confirm('Tandai order ini sebagai selesai?')">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" title="Tandai selesai">
                                                <i class="fas fa-check me-1"></i> Selesai
                                            </button>
                                        </form>
                                    @endif

                                    @if(in_array($order->status, ['paid', 'done']))
                                        <!-- Cetak Invoice -->
                                        <a href="{{ route('orders.invoice', $order->id) }}" 
                                        class="btn btn-sm btn-outline-dark" target="_blank" data-bs-toggle="tooltip" title="Cetak Invoice">
                                            <i class="fas fa-file-invoice me-1"></i> Invoice
                                        </a>
                                    @endif

                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">Belum ada data order.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tooltips = document.querySelectorAll('[data-bs-toggle="tooltip"]');
        tooltips.forEach(el => new bootstrap.Tooltip(el));
    });
</script>
@endpush
