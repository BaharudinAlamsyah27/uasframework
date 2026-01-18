@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">

    {{-- Header --}}
    <div class="mb-4">
        <h2 class="fw-bold mb-1">Contoh Form Input</h2>
        <p class="text-muted mb-0">
            Simulasi pengisian data pelanggan & kendaraan
        </p>
    </div>

    <div class="row">
        <div class="col-xl-8">
            <div class="card shadow-sm border-0">
                <div class="card-body">

                    <h5 class="mb-3">Form Informasi Umum</h5>

                    <form>

                        {{-- Nama --}}
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text"
                                   class="form-control"
                                   placeholder="Masukkan nama lengkap">
                        </div>

                        {{-- Email --}}
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email"
                                   class="form-control"
                                   placeholder="contoh@email.com">
                        </div>

                        {{-- Nomor HP --}}
                        <div class="mb-3">
                            <label class="form-label">Nomor Telepon</label>
                            <input type="tel"
                                   class="form-control"
                                   placeholder="08xxxxxxxxxx">
                        </div>

                        {{-- Alamat --}}
                        <div class="mb-3">
                            <label class="form-label">Alamat Lengkap</label>
                            <textarea class="form-control"
                                      rows="3"
                                      placeholder="Alamat tempat tinggal"></textarea>
                        </div>

                        {{-- Pilih Kendaraan --}}
                        <div class="mb-3">
                            <label class="form-label">Jenis Kendaraan</label>
                            <select class="form-select">
                                <option selected disabled>-- Pilih Kendaraan --</option>
                                <option>Mobil MPV</option>
                                <option>Mobil SUV</option>
                                <option>Mobil City Car</option>
                            </select>
                        </div>

                        {{-- Tanggal Sewa --}}
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tanggal Mulai</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tanggal Selesai</label>
                                <input type="date" class="form-control">
                            </div>
                        </div>

                        {{-- Metode Pembayaran --}}
                        <div class="mb-4">
                            <label class="form-label">Metode Pembayaran</label>
                            <select class="form-select">
                                <option>Tunai</option>
                                <option>Transfer Bank</option>
                                <option>E-Wallet</option>
                            </select>
                        </div>

                        {{-- Button --}}
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-primary">
                                Simpan Data
                            </button>
                            <button type="reset" class="btn btn-outline-secondary">
                                Reset
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

        {{-- Info Samping --}}
        <div class="col-xl-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="fw-bold mb-2">Keterangan</h6>
                    <ul class="text-muted mb-0">
                        <li>Form ini hanya contoh tampilan</li>
                        <li>Tidak terhubung ke database</li>
                        <li>Digunakan untuk latihan UI</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
