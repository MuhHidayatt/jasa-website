@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <h1 class="h2 fw-bold">Dashboard</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <button class="btn btn-sm btn-outline-secondary shadow-sm me-2">
            <i class="fas fa-share-alt me-1"></i> Share
        </button>
        <button class="btn btn-sm btn-outline-secondary shadow-sm">
            <i class="fas fa-download me-1"></i> Export
        </button>
    </div>
</div>

<div class="row g-4 mb-4">
    @if(auth()->user()->level == 'admin')
    <!-- Card: Total Customer -->
    <div class="col-md-4">
        <div class="card border-start border-primary border-5 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Total Customer</h6>
                        <h2 class="mb-0">{{ $totalCustomers }}</h2>
                    </div>
                    <div class="bg-primary bg-opacity-10 p-3 rounded">
                        <i class="fas fa-users fa-2x text-primary"></i>
                    </div>
                </div>
                <hr class="my-2">
                <a href="#" class="small text-primary text-decoration-none d-flex align-items-center">
                    View details <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>
    @endif

    <!-- Card: Total Layanan -->
    <div class="col-md-4">
        <div class="card border-start border-warning border-5 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Total Layanan</h6>
                        <h2 class="mb-0">{{ $totalServices }}</h2>
                    </div>
                    <div class="bg-warning bg-opacity-10 p-3 rounded">
                        <i class="fas fa-tools fa-2x text-warning"></i>
                    </div>
                </div>
                <hr class="my-2">
                <a href="#" class="small text-warning text-decoration-none d-flex align-items-center">
                    View details <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>

    @if(auth()->user()->level == 'admin')
    <!-- Card: Total Order -->
    <div class="col-md-4">
        <div class="card border-start border-success border-5 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Total Order</h6>
                        <h2 class="mb-0">{{ $totalOrders }}</h2>
                    </div>
                    <div class="bg-success bg-opacity-10 p-3 rounded">
                        <i class="fas fa-shopping-cart fa-2x text-success"></i>
                    </div>
                </div>
                <hr class="my-2">
                <a href="#" class="small text-success text-decoration-none d-flex align-items-center">
                    View details <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>
    @endif
</div>

<div class="row g-4">
    <!-- Grafik Penjualan -->
    <div class="col-lg-8">
        <div class="card shadow-sm h-100">
            <div class="card-header">
                <h6 class="mb-0"><i class="fas fa-chart-line me-2"></i>Statistik Penjualan</h6>
            </div>
            <div class="card-body">
                <canvas id="salesChart" height="140"></canvas>
            </div>
        </div>
    </div>

    <!-- Aktivitas Terbaru -->
    <div class="col-lg-4">
        <div class="card shadow-sm h-100 rounded-3 border-0">
            <div class="card-header bg-white border-bottom">
                <div class="card-header">
                    <h6 class="mb-0"><i class="fas fa-clock me-2"></i>Aktivitas Terbaru</h6>
                </div>
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    @forelse($activities as $activity)
                        <li class="list-group-item d-flex justify-content-between align-items-start px-3 py-2 border-bottom">
                            <div class="text-wrap">
                                {!! $activity['text'] !!}
                            </div>
                            <small class="text-muted ms-3 text-nowrap">{{ $activity['time'] }}</small>
                        </li>
                    @empty
                        <li class="list-group-item text-center text-muted py-3">
                            Tidak ada aktivitas terbaru.
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.3.0/chart.min.css">
<style>
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 0.5rem;
    }
    .card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
    }
    .border-5 {
        border-width: 5px !important;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('salesChart');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($months),
            datasets: [{
                label: 'Order Bulanan',
                data: @json($monthlyOrders),
                fill: true,
                tension: 0.4,
                backgroundColor: 'rgba(59,130,246,0.2)',
                borderColor: 'rgba(59,130,246,1)',
                borderWidth: 2,
                pointBackgroundColor: '#3b82f6'
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
</script>
@endpush
