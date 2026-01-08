<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyewaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kendaraan_id',
        'nama_penyewa',
        'nik',
        'alamat',
        'durasi_sewa',
        'metode_pembayaran',
        'status_pembayaran',
        'total_harga'
    ];

    // Jika menggunakan field lengkap
    // protected $fillable = [
    //     'kode_penyewaan', 'kendaraan_id', 'nama_penyewa', 'email',
    //     'no_hp', 'nik', 'alamat', 'tanggal_sewa', 'tanggal_kembali',
    //     'durasi_sewa', 'total_harga', 'metode_pembayaran',
    //     'status_pembayaran', 'status_penyewaan', 'catatan'
    // ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($penyewaan) {
            // Auto generate kode penyewaan jika field lengkap
            // $penyewaan->kode_penyewaan = 'SW' . date('Ymd') . str_pad(Penyewaan::count() + 1, 4, '0', STR_PAD_LEFT);
        });
    }

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }

    public function getTotalHargaFormattedAttribute()
    {
        return 'Rp ' . number_format($this->total_harga ?? 0, 0, ',', '.');
    }
}
