@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">

    {{-- Header --}}
    <div class="mb-4">
        <h2 class="fw-bold mb-1">Dashboard Admin</h2>
        <p class="text-muted mb-0">
            Ringkasan data operasional Alam Rent hari ini
        </p>
    </div>

    {{-- Statistik Utama --}}
    <div class="row g-3 mb-4">

        {{-- Total Kendaraan --}}
        <div class="col-md-6 col-xl-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-1">Jumlah Kendaraan</p>
                            <h3 class="fw-bold mb-0">{{ $totalKendaraan }}</h3>
                        </div>
                        <div class="text-primary fs-2">
                            <i class="mdi mdi-car-multiple"></i>
                        </div>
                    </div>
                    <small class="text-muted">Unit terdaftar</small>
                </div>
            </div>
        </div>

        {{-- Kendaraan Tersedia --}}
        <div class="col-md-6 col-xl-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-1">Siap Disewa</p>
                            <h3 class="fw-bold mb-0">{{ $kendaraanTersedia }}</h3>
                        </div>
                        <div class="text-success fs-2">
                            <i class="mdi mdi-check-circle-outline"></i>
                        </div>
                    </div>
                    <small class="text-muted">Status tersedia</small>
                </div>
            </div>
        </div>

        {{-- Total Transaksi --}}
        <div class="col-md-6 col-xl-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-1">Total Transaksi</p>
                            <h3 class="fw-bold mb-0">{{ $totalPenyewaan }}</h3>
                        </div>
                        <div class="text-warning fs-2">
                            <i class="mdi mdi-file-document-multiple-outline"></i>
                        </div>
                    </div>
                    <small class="text-muted">Seluruh penyewaan</small>
                </div>
            </div>
        </div>

        {{-- Transaksi Hari Ini --}}
        <div class="col-md-6 col-xl-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-1">Hari Ini</p>
                            <h3 class="fw-bold mb-0">{{ $penyewaanHariIni }}</h3>
                        </div>
                        <div class="text-info fs-2">
                            <i class="mdi mdi-calendar-today"></i>
                        </div>
                    </div>
                    <small class="text-muted">Transaksi baru</small>
                </div>
            </div>
        </div>

    </div>

    {{-- Pendapatan --}}
    <div class="row">
        <div class="col-xl-12">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center py-4">
                    <h5 class="text-muted mb-2">Total Pendapatan Bersih</h5>
                    <h1 class="fw-bold text-success mb-2">
                        Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
                    </h1>
                    <p class="text-muted mb-0">
                        Akumulasi transaksi dengan status <strong>lunas</strong>
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
