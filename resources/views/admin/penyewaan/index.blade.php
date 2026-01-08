@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Title -->
    <div class="py-3 py-lg-4">
        <div class="row">
            <div class="col-lg-6">
                <h4 class="page-title mb-0">Data Penyewaan</h4>
            </div>
            <div class="col-lg-6">
                <div class="d-none d-lg-block">
                    <ol class="breadcrumb m-0 float-end">
                        <li class="breadcrumb-item">Transaksi</li>
                        <li class="breadcrumb-item active">Penyewaan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    {{-- Alert --}}
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="d-flex justify-content-between mb-3">
                        <h4 class="header-title">Daftar Penyewaan</h4>
                        <a href="{{ route('admin.penyewaan.create') }}" class="btn btn-primary">
                            <i class="mdi mdi-plus"></i> Tambah Penyewaan
                        </a>
                    </div>

                    <table id="basic-datatable"
                           class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Penyewa</th>
                                <th>Kendaraan</th>
                                <th>Durasi</th>
                                <th>Total Harga</th>
                                <th>Status Pembayaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($penyewaans as $penyewaan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $penyewaan->nama_penyewa }}</td>
                                    <td>{{ $penyewaan->kendaraan->merk ?? '-' }}</td>
                                    <td>{{ $penyewaan->durasi_sewa }} Hari</td>
                                    <td>
                                        Rp {{ number_format($penyewaan->total_harga, 0, ',', '.') }}
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
                                                    Batal
                                                </option>
                                            </select>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.penyewaan.show', $penyewaan->id) }}"
                                           class="btn btn-info btn-sm">
                                            <i class="mdi mdi-eye"></i>
                                        </a>

                                        <a href="{{ route('admin.penyewaan.edit', $penyewaan->id) }}"
                                           class="btn btn-warning btn-sm">
                                            <i class="mdi mdi-pencil"></i>
                                        </a>

                                        <form action="{{ route('admin.penyewaan.destroy', $penyewaan->id) }}"
                                              method="POST"
                                              class="d-inline"
                                              onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">
                                                <i class="mdi mdi-delete"></i>
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

</div>
@endsection
