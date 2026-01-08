@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Title -->
    <div class="py-3 py-lg-4">
        <div class="row">
            <div class="col-lg-6">
                <h4 class="page-title mb-0">Detail Kendaraan</h4>
            </div>
            <div class="col-lg-6">
                <div class="d-none d-lg-block">
                    <ol class="breadcrumb m-0 float-end">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.kendaraan.index') }}">Kendaraan</a>
                        </li>
                        <li class="breadcrumb-item active">Detail</li>
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

                    <div class="row">

                        {{-- Gambar --}}
                        <div class="col-md-4 text-center">
                            @if ($kendaraan->gambar)
                                <img src="{{ asset('storage/kendaraan/' . $kendaraan->gambar) }}"
                                     class="img-fluid img-thumbnail mb-3"
                                     style="max-height:300px">
                            @else
                                <div class="text-muted">Tidak ada gambar</div>
                            @endif
                        </div>

                        {{-- Detail --}}
                        <div class="col-md-8">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="30%">Merk</th>
                                    <td>{{ $kendaraan->merk }}</td>
                                </tr>
                                <tr>
                                    <th>Plat Nomor</th>
                                    <td>{{ $kendaraan->platanomor }}</td>
                                </tr>
                                <tr>
                                    <th>Harga / Hari</th>
                                    <td>Rp {{ number_format($kendaraan->harga, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        @if ($kendaraan->status == 'tersedia')
                                            <span class="badge bg-success">Tersedia</span>
                                        @elseif ($kendaraan->status == 'disewa')
                                            <span class="badge bg-warning">Disewa</span>
                                        @else
                                            <span class="badge bg-danger">Perbaikan</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Deskripsi</th>
                                    <td>{{ $kendaraan->deskripsi }}</td>
                                </tr>
                                <tr>
                                    <th>Dibuat</th>
                                    <td>{{ $kendaraan->created_at->format('d M Y') }}</td>
                                </tr>
                                <tr>
                                    <th>Terakhir Update</th>
                                    <td>{{ $kendaraan->updated_at->format('d M Y') }}</td>
                                </tr>
                            </table>

                            {{-- Button --}}
                            <div class="mt-3">
                                <a href="{{ route('admin.kendaraan.edit', $kendaraan->id) }}"
                                   class="btn btn-warning">
                                    <i class="mdi mdi-pencil"></i> Edit
                                </a>

                                <a href="{{ route('admin.kendaraan.index') }}"
                                   class="btn btn-secondary">
                                    Kembali
                                </a>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection
