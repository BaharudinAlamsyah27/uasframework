@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">

    {{-- Header --}}
    <div class="mb-4">
        <h2 class="fw-bold mb-1">Riwayat Transaksi</h2>
        <p class="text-muted mb-0">
            Daftar penyewaan kendaraan yang tercatat dalam sistem
        </p>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0">Data Penyewaan</h5>
                        <span class="badge bg-primary">Preview Table</span>
                    </div>

                    <table id="basic-datatable"
                           class="table table-bordered table-striped nowrap w-100">

                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Penyewa</th>
                                <th>Kendaraan</th>
                                <th>Durasi</th>
                                <th>Total Bayar</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Baharudin</td>
                                <td>Toyota Fortuner</td>
                                <td>2 Hari</td>
                                <td>Rp 1.500.000</td>
                                <td>
                                    <span class="badge bg-success">Lunas</span>
                                </td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td>Siti Rahma</td>
                                <td>Honda Brio</td>
                                <td>3 Hari</td>
                                <td>Rp 900.000</td>
                                <td>
                                    <span class="badge bg-warning">Menunggu</span>
                                </td>
                            </tr>

                            <tr>
                                <td>3</td>
                                <td>Andi Pratama</td>
                                <td>Mitsubishi Xpander</td>
                                <td>1 Hari</td>
                                <td>Rp 400.000</td>
                                <td>
                                    <span class="badge bg-info">DP</span>
                                </td>
                            </tr>
                        </tbody>

                    </table>

                    <div class="mt-3 text-muted small">
                        * Data di atas hanya contoh tampilan tabel (dummy data)
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection
