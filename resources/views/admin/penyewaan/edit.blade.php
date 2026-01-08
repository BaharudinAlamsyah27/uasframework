@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Title -->
    <div class="py-3 py-lg-4">
        <div class="row">
            <div class="col-lg-6">
                <h4 class="page-title mb-0">Edit Penyewaan</h4>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb m-0 float-end">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.penyewaan.index') }}">Penyewaan</a>
                    </li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">

            {{-- Error --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.penyewaan.update', $penyewaan->id) }}"
                  method="POST"
                  class="form-horizontal">
                @csrf
                @method('PUT')

                {{-- Kendaraan --}}
                <div class="mb-2 row">
                    <label class="col-md-2 col-form-label">Kendaraan</label>
                    <div class="col-md-10">
                        <select name="kendaraan_id"
                                id="kendaraan_id"
                                class="form-control"
                                required>
                            @foreach ($kendaraans as $kendaraan)
                                <option value="{{ $kendaraan->id }}"
                                    data-harga="{{ $kendaraan->harga }}"
                                    {{ $penyewaan->kendaraan_id == $kendaraan->id ? 'selected' : '' }}>
                                    {{ $kendaraan->merk }}
                                    ({{ $kendaraan->status }})
                                </option>
                            @endforeach
                        </select>
                        <small class="text-muted">
                            Mengganti kendaraan akan mengubah status kendaraan lama & baru
                        </small>
                    </div>
                </div>

                {{-- Nama --}}
                <div class="mb-2 row">
                    <label class="col-md-2 col-form-label">Nama Penyewa</label>
                    <div class="col-md-10">
                        <input type="text"
                               name="nama_penyewa"
                               class="form-control"
                               value="{{ old('nama_penyewa', $penyewaan->nama_penyewa) }}"
                               required>
                    </div>
                </div>

                {{-- NIK --}}
                <div class="mb-2 row">
                    <label class="col-md-2 col-form-label">NIK</label>
                    <div class="col-md-10">
                        <input type="text"
                               name="nik"
                               maxlength="16"
                               class="form-control"
                               value="{{ old('nik', $penyewaan->nik) }}"
                               required>
                    </div>
                </div>

                {{-- Alamat --}}
                <div class="mb-2 row">
                    <label class="col-md-2 col-form-label">Alamat</label>
                    <div class="col-md-10">
                        <textarea name="alamat"
                                  class="form-control"
                                  rows="3"
                                  required>{{ old('alamat', $penyewaan->alamat) }}</textarea>
                    </div>
                </div>

                {{-- Durasi --}}
                <div class="mb-2 row">
                    <label class="col-md-2 col-form-label">Durasi (Hari)</label>
                    <div class="col-md-10">
                        <input type="number"
                               name="durasi_sewa"
                               id="durasi_sewa"
                               class="form-control"
                               min="1"
                               max="365"
                               value="{{ old('durasi_sewa', $penyewaan->durasi_sewa) }}"
                               required>
                    </div>
                </div>

                {{-- Estimasi Total (display only) --}}
                <div class="mb-2 row">
                    <label class="col-md-2 col-form-label">Estimasi Total</label>
                    <div class="col-md-10">
                        <input type="text"
                               id="total_harga"
                               class="form-control"
                               value="Rp {{ number_format($penyewaan->total_harga,0,',','.') }}"
                               readonly>
                    </div>
                </div>

                {{-- Metode Pembayaran --}}
                <div class="mb-2 row">
                    <label class="col-md-2 col-form-label">Metode Pembayaran</label>
                    <div class="col-md-10">
                        <select name="metode_pembayaran" class="form-control" required>
                            <option value="tunai" {{ $penyewaan->metode_pembayaran == 'tunai' ? 'selected' : '' }}>
                                Tunai
                            </option>
                            <option value="transfer" {{ $penyewaan->metode_pembayaran == 'transfer' ? 'selected' : '' }}>
                                Transfer
                            </option>
                            <option value="kartu_kredit" {{ $penyewaan->metode_pembayaran == 'kartu_kredit' ? 'selected' : '' }}>
                                Kartu Kredit
                            </option>
                        </select>
                    </div>
                </div>

                {{-- Status Pembayaran --}}
                <div class="mb-3 row">
                    <label class="col-md-2 col-form-label">Status Pembayaran</label>
                    <div class="col-md-10">
                        <select name="status_pembayaran" class="form-control" required>
                            <option value="menunggu" {{ $penyewaan->status_pembayaran == 'menunggu' ? 'selected' : '' }}>
                                Menunggu
                            </option>
                            <option value="dp" {{ $penyewaan->status_pembayaran == 'dp' ? 'selected' : '' }}>
                                DP
                            </option>
                            <option value="lunas" {{ $penyewaan->status_pembayaran == 'lunas' ? 'selected' : '' }}>
                                Lunas
                            </option>
                            <option value="batal" {{ $penyewaan->status_pembayaran == 'batal' ? 'selected' : '' }}>
                                Batal
                            </option>
                        </select>
                    </div>
                </div>

                {{-- Button --}}
                <div class="row">
                    <div class="col-md-10 offset-md-2">
                        <button class="btn btn-warning">
                            <i class="mdi mdi-content-save-edit"></i> Update
                        </button>
                        <a href="{{ route('admin.penyewaan.show', $penyewaan->id) }}"
                           class="btn btn-secondary">
                            Kembali
                        </a>
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

    function hitungTotal() {
        const harga = kendaraan.options[kendaraan.selectedIndex]?.dataset.harga || 0;
        total.value = 'Rp ' + new Intl.NumberFormat('id-ID')
            .format(harga * durasi.value);
    }

    kendaraan.addEventListener('change', hitungTotal);
    durasi.addEventListener('input', hitungTotal);
</script>
@endsection
