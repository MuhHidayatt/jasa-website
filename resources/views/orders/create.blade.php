@extends('layouts.app')
@section('title', 'Tambah Order')
@section('content')
<div class="container">
    <h3 class="mb-4">Tambah Order Baru</h3>
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="kode_customer" class="form-label">Pilih Customer</label>
            <select name="kode_customer" class="form-select" required>
                <option value="">-- Pilih --</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->kode_customer }}">{{ $customer->name_customer }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="is_custom" class="form-label">Jenis Order</label>
            <select name="is_custom" id="is_custom" class="form-select" required onchange="toggleCustomFields()">
                <option value="0">Layanan Biasa</option>
                <option value="1">Custom Layanan</option>
            </select>
        </div>

        <div class="mb-3" id="service_section">
            <label for="kode_service" class="form-label">Pilih Layanan</label>
            <select name="kode_service" class="form-select">
                <option value="">-- Pilih --</option>
                @foreach($services as $service)
                    <option value="{{ $service->kode_service }}">{{ $service->name_service }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3 d-none" id="custom_section">
            <label for="custom_request" class="form-label">Deskripsi Custom Layanan</label>
            <textarea name="custom_request" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label for="order_date" class="form-label">Tanggal Order</label>
            <input type="date" name="order_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="notes" class="form-label">Catatan</label>
            <textarea name="notes" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection

@push('scripts')
<script>
function toggleCustomFields() {
    const isCustom = document.getElementById('is_custom').value;
    const customSection = document.getElementById('custom_section');
    const serviceSection = document.getElementById('service_section');

    if (isCustom == '1') {
        customSection.classList.remove('d-none');
        serviceSection.classList.add('d-none');
    } else {
        customSection.classList.add('d-none');
        serviceSection.classList.remove('d-none');
    }
}
document.addEventListener('DOMContentLoaded', toggleCustomFields);
</script>
@endpush