@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Header -->
    <div class="py-3 py-lg-4">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h4 class="page-title mb-0">Form Penyewaan Kendaraan</h4>
                <small class="text-muted">Masukkan data penyewa dan kendaraan</small>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb m-0 float-end">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.penyewaan.index') }}">Transaksi</a>
                    </li>
                    <li class="breadcrumb-item active">Tambah Penyewaan</li>
                </ol>
            </div>
        </div>
    </div>

    <!-- Card -->
    <div class="card shadow-sm">
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Terjadi kesalahan:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.penyewaan.store') }}" method="POST">
                @csrf

                <div class="row">

                    <!-- Kiri -->
                    <div class="col-md-6">

                        <div class="mb-3">
                            <label class="form-label">Pilih Kendaraan</label>
                            <select name="kendaraan_id" id="kendaraan_id" class="form-control" required>
                                <option value="">-- Pilih Kendaraan --</option>
                                @foreach ($kendaraans as $kendaraan)
                                    <option value="{{ $kendaraan->id }}"
                                        data-harga="{{ $kendaraan->harga }}"
                                        {{ old('kendaraan_id') == $kendaraan->id ? 'selected' : '' }}>
                                        {{ $kendaraan->merk }} — Rp {{ number_format($kendaraan->harga,0,',','.') }}/hari
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap Penyewa</label>
                            <input type="text" name="nama_penyewa"
                                   class="form-control"
                                   placeholder="Contoh: Budi Santoso"
                                   value="{{ old('nama_penyewa') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">NIK</label>
                            <input type="text" name="nik"
                                   maxlength="16"
                                   class="form-control"
                                   placeholder="16 digit NIK"
                                   value="{{ old('nik') }}" required>
                        </div>

                    </div>

                    <!-- Kanan -->
                    <div class="col-md-6">

                        <div class="mb-3">
                            <label class="form-label">Alamat Lengkap</label>
                            <textarea name="alamat" rows="3"
                                      class="form-control"
                                      placeholder="Alamat domisili penyewa"
                                      required>{{ old('alamat') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Durasi Sewa (Hari)</label>
                            <input type="number" name="durasi_sewa"
                                   id="durasi_sewa"
                                   class="form-control"
                                   min="1" max="365"
                                   value="{{ old('durasi_sewa', 1) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Estimasi Total Biaya</label>
                            <input type="text"
                                   id="total_harga"
                                   class="form-control bg-light fw-bold"
                                   readonly>
                        </div>

                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Metode Pembayaran</label>
                        <select name="metode_pembayaran" class="form-control" required>
                            <option value="">-- Pilih Metode --</option>
                            <option value="tunai">Tunai</option>
                            <option value="transfer">Transfer Bank</option>
                            <option value="kartu_kredit">Kartu Kredit</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Status Pembayaran</label>
                        <select name="status_pembayaran" class="form-control" required>
                            <option value="menunggu">Menunggu</option>
                            <option value="dp">DP</option>
                            <option value="lunas">Lunas</option>
                            <option value="batal">Batal</option>
                        </select>
                    </div>
                </div>

                <div class="mt-4 text-end">
                    <a href="{{ route('admin.penyewaan.index') }}" class="btn btn-light">
                        Kembali
                    </a>
                    <button class="btn btn-primary px-4">
                        Simpan Transaksi
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

<script>
    const kendaraan = document.getElementById('kendaraan_id');
    const durasi = document.getElementById('durasi_sewa');
    const total = document.getElementById('total_harga');

    function hitungTotal() {
        const harga = kendaraan.options[kendaraan.selectedIndex]?.dataset.harga || 0;
        total.value = harga
            ? 'Rp ' + new Intl.NumberFormat('id-ID').format(harga * durasi.value)
            : '';
    }

    kendaraan.addEventListener('change', hitungTotal);
    durasi.addEventListener('input', hitungTotal);
</script>
@endsection
