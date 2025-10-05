@extends('layouts.app')
@section('title', 'Pembayaran Order')
@section('content')
<div class="container">
    <h3 class="mb-4">Form Pembayaran</h3>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('payments.store') }}" method="POST">
                @csrf

                <input type="hidden" name="kode_order" value="{{ $order->kode_order }}">

                <div class="mb-3">
                    <label class="form-label">Kode Order</label>
                    <input type="text" class="form-control" value="{{ $order->kode_order }}" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">Customer</label>
                    <input type="text" class="form-control" value="{{ $order->customer->name_customer }}" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nominal</label>
                    <input type="number" class="form-control" name="amount" step="0.01" placeholder="Contoh: 500000" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Metode Pembayaran</label>
                    <select name="method" class="form-select" required>
                        <option value="">-- Pilih Metode --</option>
                        <option value="transfer">Transfer Bank</option>
                        <option value="qris">E-Wallet</option>
                        <option value="cash">Cash</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Pembayaran</label>
                    <input type="date" class="form-control" name="payment_date" value="{{ date('Y-m-d') }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Bayar Sekarang</button>
                <a href="{{ route('orders.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
