@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Title -->
    <div class="py-3 py-lg-4">
        <div class="row">
            <div class="col-lg-6">
                <h4 class="page-title mb-0">Dashboard</h4>
            </div>
            <div class="col-lg-6">
                <div class="d-none d-lg-block">
                    <ol class="breadcrumb m-0 float-end">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Statistik Cards -->
    <div class="row">

        <!-- Total Kendaraan -->
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-muted fw-normal mt-0">Total Kendaraan</h5>
                    <h3 class="mt-3 mb-3">{{ $totalKendaraan }}</h3>
                    <span class="badge bg-primary">Unit</span>
                </div>
            </div>
        </div>

        <!-- Kendaraan Tersedia -->
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-muted fw-normal mt-0">Kendaraan Tersedia</h5>
                    <h3 class="mt-3 mb-3">{{ $kendaraanTersedia }}</h3>
                    <span class="badge bg-success">Ready</span>
                </div>
            </div>
        </div>

        <!-- Total Penyewaan -->
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-muted fw-normal mt-0">Total Penyewaan</h5>
                    <h3 class="mt-3 mb-3">{{ $totalPenyewaan }}</h3>
                    <span class="badge bg-warning">Transaksi</span>
                </div>
            </div>
        </div>

        <!-- Penyewaan Hari Ini -->
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-muted fw-normal mt-0">Penyewaan Hari Ini</h5>
                    <h3 class="mt-3 mb-3">{{ $penyewaanHariIni }}</h3>
                    <span class="badge bg-info">Hari Ini</span>
                </div>
            </div>
        </div>

    </div>
    <!-- End Statistik Cards -->

    <!-- Pendapatan -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body text-center">
                    <h4 class="header-title">Total Pendapatan</h4>
                    <h2 class="text-success mt-3">
                        Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
                    </h2>
                    <p class="text-muted">Dari penyewaan dengan status pembayaran <b>lunas</b></p>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
