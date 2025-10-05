@extends('layouts.app')
@section('title', 'Laporan Order')

@section('content')
<div class="container-fluid">
    <h1 class="h4 mb-4 fw-bold">Laporan Order</h1>

    {{-- Filter Status --}}
    <form method="GET" action="{{ route('orders.report') }}" class="row g-2 mb-3">
        <div class="col-md-3">
            <select name="status" class="form-select form-select-sm">
                <option value="">-- Semua Status --</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="paid" {{ request('status') == 'paid' ? 'selected' : '' }}>Paid</option>
                <option value="done" {{ request('status') == 'done' ? 'selected' : '' }}>Done</option>
            </select>
        </div>
        <div class="col-md-3">
            <button class="btn btn-sm btn-primary" type="submit">Filter</button>
            <a href="{{ route('orders.report') }}" class="btn btn-sm btn-outline-secondary">Reset</a>
        </div>
    </form>

    {{-- Tombol Cetak PDF --}}
    <div class="mb-3">
        <a href="{{ route('orders.report.pdf', ['status' => request('status')]) }}" target="_blank" class="btn btn-sm btn-danger">
            <i class="fas fa-file-pdf me-1"></i> Cetak PDF
        </a>
    </div>

    {{-- Tabel Laporan --}}
    <div class="card shadow-sm">
        <div class="card-body p-3">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-sm">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Kode Order</th>
                            <th>Customer</th>
                            <th>Tanggal</th>
                            <th>Jenis</th>
                            <th>Layanan / Request</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $order->kode_order }}</td>
                                <td>{{ $order->customer->name_customer }}</td>
                                <td>{{ $order->order_date->format('d/m/Y') }}</td>
                                <td>{{ $order->is_custom ? 'Custom' : 'Standar' }}</td>
                                <td>{{ $order->is_custom ? $order->custom_request : ($order->service->name_service ?? '-') }}</td>
                                <td>
                                    <span class="badge bg-{{ $order->status == 'done' ? 'success' : ($order->status == 'paid' ? 'primary' : 'warning') }}">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="7" class="text-center text-muted">Tidak ada data order.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
