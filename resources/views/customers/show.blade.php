@extends('layouts.app')

@section('title', 'Detail Client')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Profile Card -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-primary text-white py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">
                            <i class="fas fa-user me-2"></i>Detail Client
                        </h5>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-light dropdown-toggle" type="button" 
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="{{ route('customers.edit', $customer->id) }}">
                                        <i class="fas fa-edit text-warning me-1"></i> Edit
                                    </a>
                                </li>
                                <li>
                                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item text-danger" 
                                                onclick="return confirm('Hapus client ini?')">
                                            <i class="fas fa-trash-alt me-1"></i> Hapus
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Basic Info -->
                        <div class="col-md-6 mb-4">
                            <div class="d-flex align-items-center mb-4">
                
                                <div>
                                    <h4 class="mb-0">{{ $customer->name_customer }}</h4>
                                    <span class="badge bg-primary">{{ $customer->kode_customer }}</span>
                                </div>
                            </div>

                            <ul class="list-unstyled">
                                @if($customer->email)
                                <li class="mb-2">
                                    <i class="fas fa-envelope text-muted me-2"></i>
                                    {{ $customer->email }}
                                </li>
                                @endif
                                @if($customer->phone)
                                <li class="mb-2">
                                    <i class="fas fa-phone text-muted me-2"></i>
                                    {{ $customer->phone }}
                                </li>
                                @endif
                            </ul>
                        </div>

                        <!-- Additional Info -->
                        <div class="col-md-6">
                            <div class="table-responsive">
                                <table class="table table-sm table-borderless">
                                    <tbody>
                                        <tr>
                                            <th width="40%" class="text-muted">Alamat</th>
                                            <td>{{ $customer->address ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-muted">Dibuat</th>
                                            <td>{{ $customer->created_at->format('d/m/Y') }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-muted">Diupdate</th>
                                            <td>{{ $customer->updated_at->format('d/m/Y') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Back Button -->
            <div class="text-center">
                <a href="{{ route('customers.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    .avatar-initial {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
    }
</style>
@endsection