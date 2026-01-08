@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Title -->
    <div class="py-3 py-lg-4">
        <div class="row">
            <div class="col-lg-6">
                <h4 class="page-title mb-0">Detail Penyewaan</h4>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb m-0 float-end">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.penyewaan.index') }}">Penyewaan</a>
                    </li>
                    <li class="breadcrumb-item active">Detail</li>
                </ol>
            </div>
        </div>
    </div>

    {{-- Alert --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">

        {{-- DATA PENYEWAAN --}}
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Informasi Penyewaan
                </div>
                <div class="card-body">

                    <table class="table table-bordered mb-0">
                        <tr>
                            <th>Nama Penyewa</th>
                            <td>{{ $penyewaan->nama_penyewa }}</td>
                        </tr>
                        <tr>
                            <th>NIK</th>
                            <td>{{ $penyewaan->nik }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $penyewaan->alamat }}</td>
                        </tr>
                        <tr>
                            <th>Durasi Sewa</th>
                            <td>{{ $penyewaan->durasi_sewa }} Hari</td>
                        </tr>
                        <tr>
                            <th>Total Harga</th>
                            <td>
                                <strong>
                                    Rp {{ number_format($penyewaan->total_harga,0,',','.') }}
                                </strong>
                            </td>
                        </tr>
                        <tr>
                            <th>Metode Pembayaran</th>
                            <td class="text-capitalize">
                                {{ str_replace('_', ' ', $penyewaan->metode_pembayaran) }}
                            </td>
                        </tr>
                        <tr>
                            <th>Status Pembayaran</th>
                            <td>
                                @php
                                    $badge = [
                                        'menunggu' => 'warning',
                                        'dp' => 'info',
                                        'lunas' => 'success',
                                        'batal' => 'danger'
                                    ][$penyewaan->status_pembayaran];
                                @endphp

                                <span class="badge bg-{{ $badge }}">
                                    {{ strtoupper($penyewaan->status_pembayaran) }}
                                </span>
                            </td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>

        {{-- DATA KENDARAAN --}}
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header bg-success text-white">
                    Informasi Kendaraan
                </div>
                <div class="card-body">

                    <table class="table table-bordered mb-0">
                        <tr>
                            <th width="40%">Merk</th>
                            <td>{{ $penyewaan->kendaraan->merk }}</td>
                        </tr>
                        <tr>
                            <th>Plat Nomor</th>
                            <td>{{ $penyewaan->kendaraan->platanomor }}</td>
                        </tr>
                        <tr>
                            <th>Harga / Hari</th>
                            <td>
                                Rp {{ number_format($penyewaan->kendaraan->harga,0,',','.') }}
                            </td>
                        </tr>
                        <tr>
                            <th>Status Kendaraan</th>
                            <td>
                                <span class="badge bg-secondary">
                                    {{ strtoupper($penyewaan->kendaraan->status) }}
                                </span>
                            </td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>

    </div>

    {{-- ACTION --}}
    <div class="mt-3">
        <a href="{{ route('admin.penyewaan.edit', $penyewaan->id) }}"
           class="btn btn-warning">
            <i class="mdi mdi-pencil"></i> Edit
        </a>

        <form action="{{ route('admin.penyewaan.destroy', $penyewaan->id) }}"
              method="POST"
              class="d-inline"
              onsubmit="return confirm('Yakin ingin menghapus penyewaan ini?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">
                <i class="mdi mdi-delete"></i> Hapus
            </button>
        </form>

        <a href="{{ route('admin.penyewaan.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>
    </div>

</div>
@endsection
