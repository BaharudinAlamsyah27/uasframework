@extends('landing.layouts.app')

@section('sub_page')
 class="sub_page"
 @endsection
@section('content')
    <div class="hero_area">
        <!-- header section strats -->
        <header class="header_section">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg custom_nav-container">
                    <a class="navbar-brand" href="index.html">
                        <span>
                            Nabil Rent
                        </span>
                    </a>
                    <div class="navbar-collapse" id="">
                        <div class="custom_menu-btn">
                            <button onclick="openNav()">
                                <span class="s-1"> </span>
                                <span class="s-2"> </span>
                                <span class="s-3"> </span>
                            </button>
                        </div>
                        <div id="myNav" class="overlay">
                            <div class="overlay-content">
                                 <a href="{{ route('landing.index') }}">Beranda</a>

                                <a href="{{ route('landing.kendaraan') }}">Mobil</a>
                                 <a href="{{ route('admin.dashboard') }}">Dashboard</a>

                                <a href="#tentang">Tentang Kami</a>

                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!-- end header section -->
    </div>

    <section class="car_detail_section layout_padding">
        <div class="container">

            {{-- ALERT SUCCESS --}}
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row">
                {{-- DETAIL KENDARAAN --}}
                <div class="col-md-6">
                    <div class="img-box">
                        <img src="{{ asset('storage/kendaraan/' . $kendaraan->gambar) }}"
                            alt="{{ $kendaraan->nama_kendaraan }}" class="img-fluid">
                    </div>
                </div>

                <div class="col-md-6">
                    <h2>{{ $kendaraan->nama_kendaraan }}</h2>
                    <h4 class="text-primary">
                        Rp {{ number_format($kendaraan->harga, 0, ',', '.') }} / hari
                    </h4>

                    <p class="mt-3">
                        {{ $kendaraan->deskripsi ?? 'Tidak ada deskripsi kendaraan.' }}
                    </p>

                    <ul class="list-unstyled">
                        <li><strong>Status:</strong>
                            <span class="badge bg-success">
                                {{ ucfirst($kendaraan->status) }}
                            </span>
                        </li>
                    </ul>
                </div>
            </div>

            <hr>

            {{-- FORM PENYEWAAN --}}
            <div class="row mt-4">
                <div class="col-md-8 mx-auto">
                    <h3 class="text-center mb-4">Form Penyewaan Kendaraan</h3>

                    <form action="{{ route('landing.kendaraan.sewa', $kendaraan->id) }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label>Nama Penyewa</label>
                            <input type="text" name="nama_penyewa"
                                class="form-control @error('nama_penyewa') is-invalid @enderror"
                                value="{{ old('nama_penyewa') }}">
                            @error('nama_penyewa')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label>NIK</label>
                            <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror"
                                value="{{ old('nik') }}">
                            @error('nik')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label>Durasi Sewa (Hari)</label>
                            <input type="number" name="durasi_sewa" min="1"
                                class="form-control @error('durasi_sewa') is-invalid @enderror"
                                value="{{ old('durasi_sewa') }}">
                            @error('durasi_sewa')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label>Metode Pembayaran</label>
                            <select name="metode_pembayaran"
                                class="form-control @error('metode_pembayaran') is-invalid @enderror">
                                <option value="">-- Pilih Metode Pembayaran --</option>
                                <option value="tunai">Tunai</option>
                                <option value="transfer">Transfer</option>
                                <option value="kartu_kredit">Kartu Kredit</option>
                            </select>
                            @error('metode_pembayaran')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100"
                            {{ $kendaraan->status !== 'tersedia' ? 'disabled' : '' }}>
                            Sewa Sekarang
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </section>
@endsection
