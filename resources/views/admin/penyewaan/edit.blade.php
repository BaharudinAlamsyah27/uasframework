@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Perbarui Data Penyewaan</h3>
            <p class="text-muted mb-0">Kelola informasi transaksi sewa kendaraan</p>
        </div>
        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.penyewaan.index') }}">Transaksi</a>
                </li>
                <li class="breadcrumb-item active">Edit Data</li>
            </ol>
        </nav>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">

            {{-- Alert Error --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Terjadi kesalahan:</strong>
                    <ul class="mb-0 mt-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.penyewaan.update', $penyewaan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-3">

                    {{-- Kendaraan --}}
                    <div class="col-md-6">
                        <label class="form-label">Pilih Kendaraan</label>
                        <select name="kendaraan_id" id="kendaraan_id" class="form-select" required>
                            @foreach ($kendaraans as $kendaraan)
                                <option value="{{ $kendaraan->id }}"
                                    data-harga="{{ $kendaraan->harga }}"
                                    {{ $penyewaan->kendaraan_id == $kendaraan->id ? 'selected' : '' }}>
                                    {{ $kendaraan->merk }} — {{ ucfirst($kendaraan->status) }}
                                </option>
                            @endforeach
                        </select>
                        <small class="text-muted">Perubahan kendaraan akan menyesuaikan status</small>
                    </div>

                    {{-- Durasi --}}
                    <div class="col-md-6">
                        <label class="form-label">Lama Sewa (Hari)</label>
                        <input type="number"
                               name="durasi_sewa"
                               id="durasi_sewa"
                               class="form-control"
                               min="1"
                               max="365"
                               value="{{ old('durasi_sewa', $penyewaan->durasi_sewa) }}"
                               required>
                    </div>

                    {{-- Nama --}}
                    <div class="col-md-6">
                        <label class="form-label">Nama Lengkap Penyewa</label>
                        <input type="text"
                               name="nama_penyewa"
                               class="form-control"
                               value="{{ old('nama_penyewa', $penyewaan->nama_penyewa) }}"
                               required>
                    </div>

                    {{-- NIK --}}
                    <div class="col-md-6">
                        <label class="form-label">Nomor Identitas (NIK)</label>
                        <input type="text"
                               name="nik"
                               maxlength="16"
                               class="form-control"
                               value="{{ old('nik', $penyewaan->nik) }}"
                               required>
                    </div>

                    {{-- Alamat --}}
                    <div class="col-md-12">
                        <label class="form-label">Alamat Lengkap</label>
                        <textarea name="alamat"
                                  rows="3"
                                  class="form-control"
                                  required>{{ old('alamat', $penyewaan->alamat) }}</textarea>
                    </div>

                    {{-- Estimasi --}}
                    <div class="col-md-6">
                        <label class="form-label">Perkiraan Biaya</label>
                        <input type="text"
                               id="total_harga"
                               class="form-control bg-light"
                               readonly
                               value="Rp {{ number_format($penyewaan->total_harga,0,',','.') }}">
                    </div>

                    {{-- Metode Pembayaran --}}
                    <div class="col-md-3">
                        <label class="form-label">Metode Bayar</label>
                        <select name="metode_pembayaran" class="form-select" required>
                            <option value="tunai" {{ $penyewaan->metode_pembayaran == 'tunai' ? 'selected' : '' }}>Tunai</option>
                            <option value="transfer" {{ $penyewaan->metode_pembayaran == 'transfer' ? 'selected' : '' }}>Transfer</option>
                            <option value="kartu_kredit" {{ $penyewaan->metode_pembayaran == 'kartu_kredit' ? 'selected' : '' }}>Kartu Kredit</option>
                        </select>
                    </div>

                    {{-- Status --}}
                    <div class="col-md-3">
                        <label class="form-label">Status Transaksi</label>
                        <select name="status_pembayaran" class="form-select" required>
                            <option value="menunggu" {{ $penyewaan->status_pembayaran == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                            <option value="dp" {{ $penyewaan->status_pembayaran == 'dp' ? 'selected' : '' }}>DP</option>
                            <option value="lunas" {{ $penyewaan->status_pembayaran == 'lunas' ? 'selected' : '' }}>Lunas</option>
                            <option value="batal" {{ $penyewaan->status_pembayaran == 'batal' ? 'selected' : '' }}>Dibatalkan</option>
                        </select>
                    </div>

                </div>

                {{-- Button --}}
                <div class="mt-4 d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.penyewaan.show', $penyewaan->id) }}"
                       class="btn btn-outline-secondary">
                        Kembali
                    </a>
                    <button class="btn btn-success">
                        <i class="mdi mdi-update"></i> Simpan Perubahan
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

{{-- Script --}}
<script>
    const kendaraanSelect = document.getElementById('kendaraan_id');
    const durasiInput = document.getElementById('durasi_sewa');
    const totalInput = document.getElementById('total_harga');

    function updateTotalHarga() {
        const harga = kendaraanSelect.options[kendaraanSelect.selectedIndex]?.dataset.harga || 0;
        totalInput.value = 'Rp ' + new Intl.NumberFormat('id-ID')
            .format(harga * durasiInput.value);
    }

    kendaraanSelect.addEventListener('change', updateTotalHarga);
    durasiInput.addEventListener('input', updateTotalHarga);
</script>
@endsection
