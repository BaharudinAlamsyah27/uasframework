<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penyewaan;
use App\Models\Kendaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PenyewaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penyewaans = Penyewaan::with('kendaraan')
            ->latest()
            ->get();

        return view('admin.penyewaan.index', compact('penyewaans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kendaraans = Kendaraan::where('status', 'tersedia')->get();
        return view('admin.penyewaan.create', compact('kendaraans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi
        $validated = $request->validate([
            'kendaraan_id' => 'required|exists:kendaraans,id',
            'nama_penyewa' => 'required|string|max:100',
            'nik' => 'required|string|max:16',
            'alamat' => 'required|string',
            'durasi_sewa' => 'required|integer|min:1|max:365',
            'metode_pembayaran' => 'required|in:tunai,transfer,kartu_kredit',
            'status_pembayaran' => 'required|in:menunggu,dp,lunas,batal',
        ]);

        // Ambil data kendaraan untuk menghitung total harga
        $kendaraan = Kendaraan::findOrFail($validated['kendaraan_id']);

        // Hitung total harga
        $total_harga = $kendaraan->harga * $validated['durasi_sewa'];

        // Tambahkan data tambahan
        $validated['total_harga'] = $total_harga;
        $validated['kode_penyewaan'] = 'PSW' . date('Ymd') . Str::random(5);

        // Update status kendaraan menjadi disewa
        $kendaraan->update(['status' => 'disewa']);

        // Simpan data penyewaan
        $penyewaan = Penyewaan::create($validated);

        return redirect()->route('admin.penyewaan.show', $penyewaan->id)
            ->with('success', 'Penyewaan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penyewaan $penyewaan)
    {
        $penyewaan->load('kendaraan');
        return view('admin.penyewaan.show', compact('penyewaan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penyewaan $penyewaan)
    {
        $kendaraans = Kendaraan::all();
        return view('admin.penyewaan.edit', compact('penyewaan', 'kendaraans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penyewaan $penyewaan)
    {
        // Validasi
        $validated = $request->validate([
            'kendaraan_id' => 'required|exists:kendaraans,id',
            'nama_penyewa' => 'required|string|max:100',
            'nik' => 'required|string|max:16',
            'alamat' => 'required|string',
            'durasi_sewa' => 'required|integer|min:1|max:365',
            'metode_pembayaran' => 'required|in:tunai,transfer,kartu_kredit',
            'status_pembayaran' => 'required|in:menunggu,dp,lunas,batal',
        ]);

        // Cek apakah kendaraan berubah
        if ($penyewaan->kendaraan_id != $validated['kendaraan_id']) {
            // Kembalikan status kendaraan lama menjadi tersedia
            Kendaraan::where('id', $penyewaan->kendaraan_id)
                ->update(['status' => 'tersedia']);

            // Ubah status kendaraan baru menjadi disewa
            Kendaraan::where('id', $validated['kendaraan_id'])
                ->update(['status' => 'disewa']);

            // Hitung total harga baru
            $kendaraan_baru = Kendaraan::find($validated['kendaraan_id']);
            $validated['total_harga'] = $kendaraan_baru->harga * $validated['durasi_sewa'];
        } elseif ($penyewaan->durasi_sewa != $validated['durasi_sewa']) {
            // Jika hanya durasi berubah, hitung ulang harga
            $kendaraan = Kendaraan::find($validated['kendaraan_id']);
            $validated['total_harga'] = $kendaraan->harga * $validated['durasi_sewa'];
        } else {
            // Harga tetap sama
            $validated['total_harga'] = $penyewaan->total_harga;
        }

        // Update data
        $penyewaan->update($validated);

        return redirect()->route('admin.penyewaan.show', $penyewaan->id)
            ->with('success', 'Penyewaan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penyewaan $penyewaan)
    {
        // Kembalikan status kendaraan menjadi tersedia
        $penyewaan->kendaraan()->update(['status' => 'tersedia']);

        // Hapus data penyewaan
        $penyewaan->delete();

        return redirect()->route('admin.penyewaan.index')
            ->with('success', 'Penyewaan berhasil dihapus!');
    }

    /**
     * Update status pembayaran
     */
    public function updateStatusPembayaran(Request $request, $id)
    {
        $request->validate([
            'status_pembayaran' => 'required|in:menunggu,dp,lunas,batal',
        ]);

        $penyewaan = Penyewaan::findOrFail($id);
        $penyewaan->update(['status_pembayaran' => $request->status_pembayaran]);

        return back()->with('success', 'Status pembayaran berhasil diubah!');
    }


}
