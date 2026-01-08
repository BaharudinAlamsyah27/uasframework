<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use App\Models\Penyewaan;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'totalKendaraan'      => Kendaraan::count(),
            'kendaraanTersedia'   => Kendaraan::where('status', 'tersedia')->count(),
            'totalPenyewaan'      => Penyewaan::count(),
            'penyewaanHariIni'    => Penyewaan::whereDate('created_at', Carbon::today())->count(),
            'totalPendapatan'     => Penyewaan::where('status_pembayaran', 'lunas')->sum('total_harga'),
        ]);
    }
}
