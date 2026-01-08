@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">

    <div class="py-3 py-lg-4">
        <div class="row">
            <div class="col-lg-6">
                <h4 class="page-title mb-0">Tambah Penyewaan</h4>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb m-0 float-end">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.penyewaan.index') }}">Penyewaan</a>
                    </li>
                    <li class="breadcrumb-item active">Tambah</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.penyewaan.store') }}" method="POST" class="form-horizontal">
                @csrf

                {{-- Kendaraan --}}
                <div class="mb-2 row">
                    <label class="col-md-2 col-form-label">Kendaraan</label>
                    <div class="col-md-10">
                        <select name="kendaraan_id" id="kendaraan_id" class="form-control" required>
                            <option value="">-- Pilih Kendaraan --</option>
                            @foreach ($kendaraans as $kendaraan)
                                <option value="{{ $kendaraan->id }}"
                                        data-harga="{{ $kendaraan->harga }}"
                                        {{ old('kendaraan_id') == $kendaraan->id ? 'selected' : '' }}>
                                    {{ $kendaraan->merk }} (Rp {{ number_format($kendaraan->harga,0,',','.') }}/hari)
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- Nama --}}
                <div class="mb-2 row">
                    <label class="col-md-2 col-form-label">Nama Penyewa</label>
                    <div class="col-md-10">
                        <input type="text" name="nama_penyewa" class="form-control"
                               value="{{ old('nama_penyewa') }}" required>
                    </div>
                </div>

                {{-- NIK --}}
                <div class="mb-2 row">
                    <label class="col-md-2 col-form-label">NIK</label>
                    <div class="col-md-10">
                        <input type="text" name="nik" maxlength="16"
                               class="form-control" value="{{ old('nik') }}" required>
                    </div>
                </div>

                {{-- Alamat --}}
                <div class="mb-2 row">
                    <label class="col-md-2 col-form-label">Alamat</label>
                    <div class="col-md-10">
                        <textarea name="alamat" class="form-control" rows="3" required>{{ old('alamat') }}</textarea>
                    </div>
                </div>

                {{-- Durasi --}}
                <div class="mb-2 row">
                    <label class="col-md-2 col-form-label">Durasi (Hari)</label>
                    <div class="col-md-10">
                        <input type="number" name="durasi_sewa" id="durasi_sewa"
                               class="form-control" min="1" max="365"
                               value="{{ old('durasi_sewa', 1) }}" required>
                    </div>
                </div>

                {{-- Estimasi Total (TIDAK dikirim ke controller) --}}
                <div class="mb-2 row">
                    <label class="col-md-2 col-form-label">Estimasi Total</label>
                    <div class="col-md-10">
                        <input type="text" name="total_harga" id="total_harga" class="form-control" readonly>
                    </div>
                </div>

                {{-- Metode Pembayaran --}}
                <div class="mb-2 row">
                    <label class="col-md-2 col-form-label">Metode Pembayaran</label>
                    <div class="col-md-10">
                        <select name="metode_pembayaran" class="form-control" required>
                            <option value="">-- Pilih Metode --</option>
                            <option value="tunai">Tunai</option>
                            <option value="transfer">Transfer</option>
                            <option value="kartu_kredit">Kartu Kredit</option>
                        </select>
                    </div>
                </div>

                {{-- Status Pembayaran --}}
                <div class="mb-3 row">
                    <label class="col-md-2 col-form-label">Status Pembayaran</label>
                    <div class="col-md-10">
                        <select name="status_pembayaran" class="form-control" required>
                            <option value="menunggu">Menunggu</option>
                            <option value="dp">DP</option>
                            <option value="lunas">Lunas</option>
                            <option value="batal">Batal</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-10 offset-md-2">
                        <button class="btn btn-primary">Simpan</button>
                        <a href="{{ route('admin.penyewaan.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>

<script>
    const kendaraan = document.getElementById('kendaraan_id');
    const durasi = document.getElementById('durasi_sewa');
    const total = document.getElementById('total_harga');

    function hitung() {
        const harga = kendaraan.options[kendaraan.selectedIndex]?.dataset.harga || 0;
        total.value = 'Rp ' + new Intl.NumberFormat('id-ID')
            .format(harga * durasi.value);
    }

    kendaraan.addEventListener('change', hitung);
    durasi.addEventListener('input', hitung);
</script>
@endsection
