<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kendaraans = Kendaraan::latest()->get();
        return view('admin.kendaraan.index', compact('kendaraans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kendaraan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi
        $validated = $request->validate([
            'merk' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'harga' => 'required|integer|min:0',
            'platanomor' => 'required|string|max:20|unique:kendaraans',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:tersedia,disewa,perbaikan',
        ]);

        // Upload gambar
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $filename = time() . '_' . $gambar->getClientOriginalName();

            // Simpan ke storage
            $gambar->storeAs('public/kendaraan', $filename);
            $validated['gambar'] = $filename;
        }

        // Simpan data
        Kendaraan::create($validated);

        return redirect()->route('admin.kendaraan.index')
            ->with('success', 'Kendaraan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kendaraan $kendaraan)
    {
        return view('admin.kendaraan.show', compact('kendaraan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kendaraan $kendaraan)
    {
        return view('admin.kendaraan.edit', compact('kendaraan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kendaraan $kendaraan)
    {
        // Validasi
        $validated = $request->validate([
            'merk' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'harga' => 'required|integer|min:0',
            'platanomor' => 'required|string|max:20|unique:kendaraans,platanomor,' . $kendaraan->id,
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:tersedia,disewa,perbaikan',
        ]);

        // Handle upload gambar baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($kendaraan->gambar) {
                Storage::delete('public/kendaraan/' . $kendaraan->gambar);
            }

            // Upload gambar baru
            $gambar = $request->file('gambar');
            $filename = time() . '_' . $gambar->getClientOriginalName();
            $gambar->storeAs('public/kendaraan', $filename);
            $validated['gambar'] = $filename;
        } else {
            // Jika tidak ada gambar baru, tetap gunakan gambar lama
            $validated['gambar'] = $kendaraan->gambar;
        }

        // Update data
        $kendaraan->update($validated);

        return redirect()->route('admin.kendaraan.index')
            ->with('success', 'Kendaraan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kendaraan $kendaraan)
    {
        // Hapus gambar dari storage
        if ($kendaraan->gambar) {
            Storage::delete('public/kendaraan/' . $kendaraan->gambar);
        }

        // Hapus data
        $kendaraan->delete();

        return redirect()->route('admin.kendaraan.index')
            ->with('success', 'Kendaraan berhasil dihapus!');
    }

    /**
     * Update status kendaraan
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:tersedia,disewa,perbaikan',
        ]);

        $kendaraan = Kendaraan::findOrFail($id);
        $kendaraan->update(['status' => $request->status]);

        return back()->with('success', 'Status kendaraan berhasil diubah!');
    }
}
