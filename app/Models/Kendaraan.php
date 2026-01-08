<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $fillable = [
        'merk',
        'deskripsi',
        'harga',
        'platanomor',
        'gambar',
        'status'
    ];

    public function penyewaans()
    {
        return $this->hasMany(Penyewaan::class);
    }

    public function getGambarUrlAttribute()
    {
        if ($this->gambar) {
            return asset('storage/kendaraan/' . $this->gambar);
        }
        return asset('images/default-car.png');
    }

    public function isAvailable()
    {
        return $this->status === 'tersedia';
    }
}
