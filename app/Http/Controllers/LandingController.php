<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Penyewaan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LandingController extends Controller
{
    /**
     * Halaman utama (landing page)
     * Menampilkan promosi & 3 kendaraan terbaru
     */
    public function index()
    {
        $kendaraanTerbaru = Kendaraan::where('status', 'tersedia')
            ->latest()
            ->take(3)
            ->get();

        return view('landing.index', compact('kendaraanTerbaru'));
    }

    /**
     * Halaman daftar kendaraan
     * Menampilkan semua kendaraan
     */
    public function kendaraan()
    {
        $kendaraans = Kendaraan::latest()->get();

        return view('landing.kendaraan', compact('kendaraans'));
    }

    /**
     * Halaman detail kendaraan
     * Detail kendaraan + form penyewaan
     */
    public function detailKendaraan($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);

        return view('landing.detail-kendaraan', compact('kendaraan'));
    }

    public function sewa(Request $request, $id)
{
    $kendaraan = Kendaraan::findOrFail($id);

    // Validasi form (sesuai yang kamu pakai di admin)
    $validated = $request->validate([
        'nama_penyewa' => 'required|string|max:100',
        'nik' => 'required|string|max:16',
        'alamat' => 'required|string',
        'durasi_sewa' => 'required|integer|min:1|max:365',
        'metode_pembayaran' => 'required|in:tunai,transfer,kartu_kredit',
    ]);

    // Hitung total harga
    $total_harga = $kendaraan->harga * $validated['durasi_sewa'];

    // Simpan penyewaan
    Penyewaan::create([
        'kendaraan_id' => $kendaraan->id,
        'nama_penyewa' => $validated['nama_penyewa'],
        'nik' => $validated['nik'],
        'alamat' => $validated['alamat'],
        'durasi_sewa' => $validated['durasi_sewa'],
        'metode_pembayaran' => $validated['metode_pembayaran'],
        'status_pembayaran' => 'menunggu',
        'total_harga' => $total_harga,
        'kode_penyewaan' => 'PSW' . date('Ymd') . Str::random(5),
    ]);

    // Update status kendaraan
    $kendaraan->update(['status' => 'disewa']);

    return redirect()->route('landing.kendaraan.detail', $kendaraan->id)
        ->with('success', 'Penyewaan berhasil! Kami akan segera menghubungi Anda.');
}
}
