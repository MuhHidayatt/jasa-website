@extends('layouts.app')

@section('title', 'Detail Order')
@section('content')
<div class="container">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold text-primary">📦 Detail Order</h4>
        <a href="{{ route('orders.index') }}" class="btn btn-sm btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Kembali ke Daftar Order
        </a>
    </div>

    <!-- Card Detail -->
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="row g-3">

                <!-- Kode Order dan Status -->
                <div class="col-md-6">
                    <label class="fw-semibold text-muted">Kode Order</label>
                    <div class="fs-6 fw-bold">{{ $order->kode_order }}</div>
                </div>
                <div class="col-md-6">
                    <label class="fw-semibold text-muted">Status Order</label>
                    <div>
                        <span class="badge bg-{{ 
                            $order->status === 'done' ? 'success' : 
                            ($order->status === 'paid' ? 'primary' : 'warning') }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>
                </div>

                <!-- Nama Customer -->
                <div class="col-md-6">
                    <label class="fw-semibold text-muted">Nama Customer</label>
                    <div>{{ $order->customer->name_customer }}</div>
                </div>

                <!-- Jenis Order -->
                <div class="col-md-6">
                    <label class="fw-semibold text-muted">Jenis Order</label>
                    <div>{{ $order->is_custom ? 'Custom Request' : 'Layanan Biasa' }}</div>
                </div>

                <!-- Layanan / Request -->
                @if($order->is_custom)
                    <div class="col-md-12">
                        <label class="fw-semibold text-muted">Custom Request</label>
                        <div>{{ $order->custom_request }}</div>
                    </div>
                @else
                    <div class="col-md-12">
                        <label class="fw-semibold text-muted">Layanan</label>
                        <div>{{ $order->service->name_service ?? '-' }}</div>
                    </div>
                @endif

                <!-- Tanggal Order -->
                <div class="col-md-6">
                    <label class="fw-semibold text-muted">Tanggal Order</label>
                    <div>{{ $order->order_date->format('d M Y') }}</div>
                </div>

                <!-- Catatan -->
                <div class="col-md-6">
                    <label class="fw-semibold text-muted">Catatan</label>
                    <div>{{ $order->notes ?? '-' }}</div>
                </div>

                <!-- Informasi Pembayaran (jika ada) -->
                @if($order->payment)
                    <div class="col-12">
                        <hr>
                        <h6 class="fw-bold text-success mb-3">🧾 Informasi Pembayaran</h6>
                    </div>

                    <div class="col-md-6">
                        <label class="fw-semibold text-muted">Tanggal Pembayaran</label>
                        <div>{{ $order->payment->payment_date->format('d M Y') }}</div>
                    </div>

                    <div class="col-md-6">
                        <label class="fw-semibold text-muted">Metode Pembayaran</label>
                        <div>{{ ucfirst($order->payment->method) }}</div>
                    </div>

                    <div class="col-md-6">
                        <label class="fw-semibold text-muted">Nominal</label>
                        <div>Rp {{ number_format($order->payment->amount, 0, ',', '.') }}</div>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
