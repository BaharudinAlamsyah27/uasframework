@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Manajemen Penyewaan</h3>
            <p class="text-muted mb-0">Daftar seluruh transaksi sewa kendaraan</p>
        </div>
        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">Transaksi</li>
                <li class="breadcrumb-item active">Penyewaan</li>
            </ol>
        </nav>
    </div>

    {{-- Alert --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Summary --}}
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">Total Transaksi</h6>
                    <h4 class="fw-bold">{{ $penyewaans->count() }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">Lunas</h6>
                    <h4 class="fw-bold text-success">
                        {{ $penyewaans->where('status_pembayaran','lunas')->count() }}
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">DP</h6>
                    <h4 class="fw-bold text-warning">
                        {{ $penyewaans->where('status_pembayaran','dp')->count() }}
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">Menunggu</h6>
                    <h4 class="fw-bold text-secondary">
                        {{ $penyewaans->where('status_pembayaran','menunggu')->count() }}
                    </h4>
                </div>
            </div>
        </div>
    </div>

    {{-- Table --}}
    <div class="card shadow-sm border-0">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-semibold mb-0">Riwayat Penyewaan</h5>
                <a href="{{ route('admin.penyewaan.create') }}" class="btn btn-success">
                    <i class="mdi mdi-plus-circle"></i> Transaksi Baru
                </a>
            </div>

            <div class="table-responsive">
                <table id="basic-datatable" class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Penyewa</th>
                            <th>Kendaraan</th>
                            <th>Lama Sewa</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penyewaans as $penyewaan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <strong>{{ $penyewaan->nama_penyewa }}</strong>
                                </td>
                                <td>
                                    {{ $penyewaan->kendaraan->merk ?? '-' }}
                                </td>
                                <td>
                                    {{ $penyewaan->durasi_sewa }} hari
                                </td>
                                <td>
                                    <span class="fw-semibold">
                                        Rp {{ number_format($penyewaan->total_harga,0,',','.') }}
                                    </span>
                                </td>
                                <td>
                                    <form action="{{ route('admin.penyewaan.update-status-pembayaran', $penyewaan->id) }}"
                                          method="POST">
                                        @csrf
                                        @method('PUT')
                                        <select name="status_pembayaran"
                                                class="form-select form-select-sm"
                                                onchange="this.form.submit()">
                                            <option value="menunggu" {{ $penyewaan->status_pembayaran == 'menunggu' ? 'selected' : '' }}>
                                                Menunggu
                                            </option>
                                            <option value="dp" {{ $penyewaan->status_pembayaran == 'dp' ? 'selected' : '' }}>
                                                DP
                                            </option>
                                            <option value="lunas" {{ $penyewaan->status_pembayaran == 'lunas' ? 'selected' : '' }}>
                                                Lunas
                                            </option>
                                            <option value="batal" {{ $penyewaan->status_pembayaran == 'batal' ? 'selected' : '' }}>
                                                Dibatalkan
                                            </option>
                                        </select>
                                    </form>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('admin.penyewaan.show', $penyewaan->id) }}"
                                       class="btn btn-outline-info btn-sm">
                                        <i class="mdi mdi-eye-outline"></i>
                                    </a>
                                    <a href="{{ route('admin.penyewaan.edit', $penyewaan->id) }}"
                                       class="btn btn-outline-warning btn-sm">
                                        <i class="mdi mdi-square-edit-outline"></i>
                                    </a>
                                    <form action="{{ route('admin.penyewaan.destroy', $penyewaan->id) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Data ini akan dihapus, lanjutkan?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger btn-sm">
                                            <i class="mdi mdi-trash-can-outline"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>
@endsection
