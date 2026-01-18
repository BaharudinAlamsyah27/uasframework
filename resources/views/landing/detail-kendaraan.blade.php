@extends('landing.layouts.app')

@section('sub_page')
class="sub_page"
@endsection

@section('content')
<div class="hero_area">
    <header class="header_section">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg custom_nav-container">
                <a class="navbar-brand" href="{{ route('landing.index') }}">
                    <span>Alam Rent</span>
                </a>

                <div class="navbar-collapse">
                    <div class="custom_menu-btn">
                        <button onclick="openNav()">
                            <span></span><span></span><span></span>
                        </button>
                    </div>

                    <div id="myNav" class="overlay">
                        <div class="overlay-content">
                            <a href="{{ route('landing.index') }}">Beranda</a>
                            <a href="{{ route('landing.kendaraan') }}">Daftar Mobil</a>
                            <a href="{{ route('admin.dashboard') }}">Admin</a>
                            <a href="#tentang">Tentang</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
</div>

<section class="layout_padding">
    <div class="container">

        {{-- Notifikasi --}}
        @if (session('success'))
            <div class="alert alert-success text-center mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- DETAIL KENDARAAN --}}
        <div class="row align-items-center mb-5">
            <div class="col-md-6 mb-3 mb-md-0">
                <div class="border rounded p-2 shadow-sm">
                    <img src="{{ asset('storage/kendaraan/' . $kendaraan->gambar) }}"
                         alt="{{ $kendaraan->nama_kendaraan }}"
                         class="img-fluid rounded">
                </div>
            </div>

            <div class="col-md-6">
                <h2 class="fw-bold mb-2">{{ $kendaraan->nama_kendaraan }}</h2>

                <div class="mb-3">
                    <span class="badge bg-dark px-3 py-2">
                        {{ strtoupper($kendaraan->status) }}
                    </span>
                </div>

                <h3 class="text-success fw-bold">
                    Rp {{ number_format($kendaraan->harga, 0, ',', '.') }}
                    <small class="text-muted fs-6">/ hari</small>
                </h3>

                <p class="mt-3 text-muted">
                    {{ $kendaraan->deskripsi ?? 'Kendaraan ini siap digunakan untuk kebutuhan perjalanan Anda dengan kondisi prima dan nyaman.' }}
                </p>

                <ul class="list-group list-group-flush mb-3">
                    <li class="list-group-item px-0">
                        <strong>Kategori:</strong> Mobil Sewa Harian
                    </li>
                    <li class="list-group-item px-0">
                        <strong>Kondisi:</strong> Terawat & Siap Jalan
                    </li>
                </ul>
            </div>
        </div>

        {{-- FORM SEWA --}}
        <div class="row">
            <div class="col-md-9 mx-auto">
                <div class="card shadow border-0">
                    <div class="card-body p-4">

                        <h4 class="text-center mb-4 fw-semibold">
                            Reservasi Kendaraan
                        </h4>

                        <form action="{{ route('landing.kendaraan.sewa', $kendaraan->id) }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input type="text" name="nama_penyewa"
                                           class="form-control @error('nama_penyewa') is-invalid @enderror"
                                           value="{{ old('nama_penyewa') }}">
                                    @error('nama_penyewa')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">NIK / Identitas</label>
                                    <input type="text" name="nik"
                                           class="form-control @error('nik') is-invalid @enderror"
                                           value="{{ old('nik') }}">
                                    @error('nik')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Alamat Lengkap</label>
                                <textarea name="alamat"
                                          class="form-control @error('alamat') is-invalid @enderror"
                                          rows="3">{{ old('alamat') }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Durasi Sewa (hari)</label>
                                    <input type="number" name="durasi_sewa" min="1"
                                           class="form-control @error('durasi_sewa') is-invalid @enderror"
                                           value="{{ old('durasi_sewa') }}">
                                    @error('durasi_sewa')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Metode Pembayaran</label>
                                    <select name="metode_pembayaran"
                                            class="form-select @error('metode_pembayaran') is-invalid @enderror">
                                        <option value="">Pilih Metode</option>
                                        <option value="tunai">Tunai</option>
                                        <option value="transfer">Transfer Bank</option>
                                        <option value="kartu_kredit">Kartu Kredit</option>
                                    </select>
                                    @error('metode_pembayaran')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit"
                                    class="btn btn-success w-100 py-2"
                                    {{ $kendaraan->status !== 'tersedia' ? 'disabled' : '' }}>
                                Ajukan Penyewaan
                            </button>

                            @if ($kendaraan->status !== 'tersedia')
                                <small class="text-danger d-block text-center mt-2">
                                    Kendaraan sedang tidak tersedia
                                </small>
                            @endif
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
