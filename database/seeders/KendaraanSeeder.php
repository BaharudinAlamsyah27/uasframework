<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kendaraan;

class KendaraanSeeder extends Seeder
{
    public function run(): void
    {
        $kendaraans = [
            ['Toyota Avanza', 'Mobil keluarga nyaman dan irit bahan bakar.', 350000, 'B 1001 AVZ'],
            ['Toyota Avanza', 'Cocok untuk perjalanan jauh dan harian.', 350000, 'B 1002 AVZ'],
            ['Honda Brio', 'City car lincah untuk penggunaan dalam kota.', 300000, 'B 1003 BRI'],
            ['Honda Brio', 'Mobil kecil, irit, dan mudah diparkir.', 300000, 'B 1004 BRI'],
            ['Mitsubishi Xpander', 'MPV modern dengan kabin luas.', 400000, 'B 1005 XPD'],
            ['Mitsubishi Xpander', 'Suspensi empuk dan nyaman.', 400000, 'B 1006 XPD'],
            ['Suzuki Ertiga', 'Mobil keluarga ekonomis.', 330000, 'B 1007 ERG'],
            ['Suzuki Ertiga', 'Irit BBM dan nyaman.', 330000, 'B 1008 ERG'],
            ['Daihatsu Terios', 'SUV tangguh untuk berbagai medan.', 450000, 'B 1009 TRS'],
            ['Daihatsu Terios', 'Cocok untuk perjalanan luar kota.', 450000, 'B 1010 TRS'],
            ['Toyota Fortuner', 'SUV premium dengan tenaga besar.', 750000, 'B 1011 FTR'],
            ['Toyota Fortuner', 'Tampilan gagah dan elegan.', 750000, 'B 1012 FTR'],
            ['Honda HR-V', 'SUV compact modern.', 500000, 'B 1013 HRV'],
            ['Honda HR-V', 'Stylish dan nyaman.', 500000, 'B 1014 HRV'],
            ['Toyota Rush', 'SUV keluarga irit dan tangguh.', 420000, 'B 1015 RSH'],
            ['Toyota Rush', 'Nyaman untuk keluarga.', 420000, 'B 1016 RSH'],
            ['Daihatsu Xenia', 'Mobil keluarga ekonomis.', 340000, 'B 1017 XEN'],
            ['Daihatsu Xenia', 'Kabin luas dan irit.', 340000, 'B 1018 XEN'],
            ['Honda Mobilio', 'MPV nyaman dan modern.', 360000, 'B 1019 MOB'],
            ['Honda Mobilio', 'Cocok untuk perjalanan harian.', 360000, 'B 1020 MOB'],
        ];

        foreach ($kendaraans as $index => $data) {
            Kendaraan::create([
                'merk'        => $data[0],
                'deskripsi'   => $data[1],
                'harga'       => $data[2],
                'platanomor'  => $data[3],
                'gambar'      => 'mobil' . (($index % 7) + 1) . '.jpg',
                'status'      => 'tersedia',
            ]);
        }
    }
}
