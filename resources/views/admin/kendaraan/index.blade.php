@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Title -->
    <div class="py-3 py-lg-4">
        <div class="row">
            <div class="col-lg-6">
                <h4 class="page-title mb-0">Data Kendaraan</h4>
            </div>
            <div class="col-lg-6">
                <div class="d-none d-lg-block">
                    <ol class="breadcrumb m-0 float-end">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master Data</a></li>
                        <li class="breadcrumb-item active">Kendaraan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

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
                        <h4 class="header-title">Daftar Kendaraan</h4>
                        <a href="{{ route('admin.kendaraan.create') }}" class="btn btn-primary">
                            <i class="mdi mdi-plus"></i> Tambah Kendaraan
                        </a>
                    </div>

                    <table id="basic-datatable" class="table table-bordered table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Merk</th>
                                <th>Plat Nomor</th>
                                <th>Harga / Hari</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($kendaraans as $kendaraan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if($kendaraan->gambar)
                                            <img src="{{ asset('storage/kendaraan/'.$kendaraan->gambar) }}"
                                                 width="80" class="img-thumbnail">
                                        @else
                                            <span class="text-muted">Tidak ada</span>
                                        @endif
                                    </td>
                                    <td>{{ $kendaraan->merk }}</td>
                                    <td>{{ $kendaraan->platanomor }}</td>
                                    <td>Rp {{ number_format($kendaraan->harga, 0, ',', '.') }}</td>
                                    <td>
                                        <form action="{{ route('admin.kendaraan.update-status', $kendaraan->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" class="form-select form-select-sm"
                                                    onchange="this.form.submit()">
                                                <option value="tersedia" {{ $kendaraan->status == 'tersedia' ? 'selected' : '' }}>
                                                    Tersedia
                                                </option>
                                                <option value="disewa" {{ $kendaraan->status == 'disewa' ? 'selected' : '' }}>
                                                    Disewa
                                                </option>
                                                <option value="perbaikan" {{ $kendaraan->status == 'perbaikan' ? 'selected' : '' }}>
                                                    Perbaikan
                                                </option>
                                            </select>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.kendaraan.show', $kendaraan->id) }}"
                                           class="btn btn-info btn-sm">
                                            <i class="mdi mdi-eye"></i>
                                        </a>

                                        <a href="{{ route('admin.kendaraan.edit', $kendaraan->id) }}"
                                           class="btn btn-warning btn-sm">
                                            <i class="mdi mdi-pencil"></i>
                                        </a>

                                        <form action="{{ route('admin.kendaraan.destroy', $kendaraan->id) }}"
                                              method="POST" class="d-inline"
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
