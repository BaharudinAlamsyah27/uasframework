@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Title -->
    <div class="py-3 py-lg-4">
        <div class="row">
            <div class="col-lg-6">
                <h4 class="page-title mb-0">Tambah Kendaraan</h4>
            </div>
            <div class="col-lg-6">
                <div class="d-none d-lg-block">
                    <ol class="breadcrumb m-0 float-end">
                        <li class="breadcrumb-item"><a href="{{ route('admin.kendaraan.index') }}">Kendaraan</a></li>
                        <li class="breadcrumb-item active">Tambah</li>
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

                    <h4 class="header-title mb-3">Form Tambah Kendaraan</h4>

                    {{-- Error Validation --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.kendaraan.store') }}"
                          method="POST"
                          enctype="multipart/form-data"
                          class="form-horizontal">
                        @csrf

                        {{-- Merk --}}
                        <div class="mb-2 row">
                            <label class="col-md-2 col-form-label">Merk</label>
                            <div class="col-md-10">
                                <input type="text"
                                       name="merk"
                                       class="form-control"
                                       value="{{ old('merk') }}"
                                       placeholder="Contoh: Toyota Avanza"
                                       required>
                            </div>
                        </div>

                        {{-- Plat Nomor --}}
                        <div class="mb-2 row">
                            <label class="col-md-2 col-form-label">Plat Nomor</label>
                            <div class="col-md-10">
                                <input type="text"
                                       name="platanomor"
                                       class="form-control"
                                       value="{{ old('platanomor') }}"
                                       placeholder="Contoh: B 1234 ABC"
                                       required>
                            </div>
                        </div>

                        {{-- Harga --}}
                        <div class="mb-2 row">
                            <label class="col-md-2 col-form-label">Harga / Hari</label>
                            <div class="col-md-10">
                                <input type="number"
                                       name="harga"
                                       class="form-control"
                                       value="{{ old('harga') }}"
                                       placeholder="Masukkan harga sewa"
                                       min="0"
                                       required>
                            </div>
                        </div>

                        {{-- Deskripsi --}}
                        <div class="mb-2 row">
                            <label class="col-md-2 col-form-label">Deskripsi</label>
                            <div class="col-md-10">
                                <textarea name="deskripsi"
                                          class="form-control"
                                          rows="4"
                                          placeholder="Deskripsi kendaraan"
                                          required>{{ old('deskripsi') }}</textarea>
                            </div>
                        </div>

                        {{-- Status --}}
                        <div class="mb-2 row">
                            <label class="col-md-2 col-form-label">Status</label>
                            <div class="col-md-10">
                                <select name="status" class="form-control" required>
                                    <option value="">-- Pilih Status --</option>
                                    <option value="tersedia" {{ old('status') == 'tersedia' ? 'selected' : '' }}>
                                        Tersedia
                                    </option>
                                    <option value="disewa" {{ old('status') == 'disewa' ? 'selected' : '' }}>
                                        Disewa
                                    </option>
                                    <option value="perbaikan" {{ old('status') == 'perbaikan' ? 'selected' : '' }}>
                                        Perbaikan
                                    </option>
                                </select>
                            </div>
                        </div>

                        {{-- Gambar --}}
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">Gambar</label>
                            <div class="col-md-10">
                                <input type="file"
                                       name="gambar"
                                       class="form-control"
                                       accept="image/*">
                                <small class="text-muted">
                                    Format: jpg, png, jpeg (Max 2MB)
                                </small>
                            </div>
                        </div>

                        {{-- Button --}}
                        <div class="row">
                            <div class="col-md-10 offset-md-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="mdi mdi-content-save"></i> Simpan
                                </button>
                                <a href="{{ route('admin.kendaraan.index') }}"
                                   class="btn btn-secondary">
                                    Kembali
                                </a>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection
