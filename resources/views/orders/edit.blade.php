@extends('layouts.app')
@section('title', 'Edit Order')
@section('content')
<div class="container">
    <h3 class="mb-4">Edit Order</h3>
    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Pilih Customer</label>
            <select name="kode_customer" class="form-select" required>
                @foreach($customers as $customer)
                    <option value="{{ $customer->kode_customer }}" {{ $order->kode_customer == $customer->kode_customer ? 'selected' : '' }}>
                        {{ $customer->name_customer }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Jenis Order</label>
            <select name="is_custom" id="is_custom" class="form-select" required onchange="toggleCustomFields()">
                <option value="0" {{ $order->is_custom == 0 ? 'selected' : '' }}>Layanan Biasa</option>
                <option value="1" {{ $order->is_custom == 1 ? 'selected' : '' }}>Custom Layanan</option>
            </select>
        </div>

        <div class="mb-3" id="service_section">
            <label class="form-label">Pilih Layanan</label>
            <select name="kode_service" class="form-select">
                @foreach($services as $service)
                    <option value="{{ $service->kode_service }}" {{ $order->kode_service == $service->kode_service ? 'selected' : '' }}>
                        {{ $service->name_service }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3 d-none" id="custom_section">
            <label class="form-label">Deskripsi Custom Layanan</label>
            <textarea name="custom_request" class="form-control">{{ $order->custom_request }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Order</label>
            <input type="date" name="order_date" class="form-control" value="{{ $order->order_date->format('Y-m-d') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Catatan</label>
            <textarea name="notes" class="form-control">{{ $order->notes }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
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
