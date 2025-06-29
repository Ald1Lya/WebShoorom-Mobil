<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Katalog;

class KatalogSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // Toyota
            [
                'nama' => 'Avanza 1.3 G',
                'harga' => 180000000,
                'tahun' => 2021,
                'transmisi' => 'Manual',
                'bahan_bakar' => 'Bensin',
                'kilometer' => 56000,
                'deskripsi' => 'Mobil irit dan nyaman untuk keluarga, kondisi siap jalan.',
                'status' => 'tersedia',
                'merek_id' => 1,
                'makelar_id' => 1,
            ],
            [
                'nama' => 'Rush TRD',
                'harga' => 230000000,
                'tahun' => 2020,
                'transmisi' => 'Otomatik',
                'bahan_bakar' => 'Bensin',
                'kilometer' => 43000,
                'deskripsi' => 'SUV tangguh cocok untuk perjalanan jauh dan medan berat.',
                'status' => 'tersedia',
                'merek_id' => 1,
                'makelar_id' => 1,
            ],
            [
                'nama' => 'Yaris G',
                'harga' => 215000000,
                'tahun' => 2019,
                'transmisi' => 'Otomatik',
                'bahan_bakar' => 'Bensin',
                'kilometer' => 50000,
                'deskripsi' => 'Hatchback stylish dan cocok untuk anak muda.',
                'status' => 'terjual',
                'merek_id' => 1,
                'makelar_id' => 1,
            ],
            [
                'nama' => 'Innova G',
                'harga' => 285000000,
                'tahun' => 2021,
                'transmisi' => 'Manual',
                'bahan_bakar' => 'Solar',
                'kilometer' => 40000,
                'deskripsi' => 'MPV luas dan nyaman untuk keluarga besar.',
                'status' => 'tersedia',
                'merek_id' => 1,
                'makelar_id' => 1,
            ],
            [
                'nama' => 'Fortuner VRZ',
                'harga' => 430000000,
                'tahun' => 2022,
                'transmisi' => 'Otomatik',
                'bahan_bakar' => 'Solar',
                'kilometer' => 28000,
                'deskripsi' => 'SUV premium dengan fitur lengkap dan mesin bertenaga.',
                'status' => 'tersedia',
                'merek_id' => 1,
                'makelar_id' => 1,
            ],
            // Honda
            [
                'nama' => 'Brio RS',
                'harga' => 170000000,
                'tahun' => 2020,
                'transmisi' => 'Manual',
                'bahan_bakar' => 'Bensin',
                'kilometer' => 39000,
                'deskripsi' => 'Kompak, hemat BBM, dan cocok untuk perkotaan.',
                'status' => 'terjual',
                'merek_id' => 2,
                'makelar_id' => 1,
            ],
            [
                'nama' => 'HR-V E',
                'harga' => 280000000,
                'tahun' => 2021,
                'transmisi' => 'Otomatik',
                'bahan_bakar' => 'Bensin',
                'kilometer' => 32000,
                'deskripsi' => 'SUV elegan dan efisien dengan kabin luas.',
                'status' => 'tersedia',
                'merek_id' => 2,
                'makelar_id' => 1,
            ],
            [
                'nama' => 'CR-V Turbo',
                'harga' => 390000000,
                'tahun' => 2022,
                'transmisi' => 'Otomatik',
                'bahan_bakar' => 'Bensin',
                'kilometer' => 25000,
                'deskripsi' => 'Performa turbo bertenaga, cocok untuk keluarga modern.',
                'status' => 'tersedia',
                'merek_id' => 2,
                'makelar_id' => 1,
            ],
            [
                'nama' => 'Civic RS',
                'harga' => 365000000,
                'tahun' => 2021,
                'transmisi' => 'Otomatik',
                'bahan_bakar' => 'Bensin',
                'kilometer' => 28000,
                'deskripsi' => 'Sedan sporty dan nyaman untuk berkendara harian.',
                'status' => 'tersedia',
                'merek_id' => 2,
                'makelar_id' => 1,
            ],
            [
                'nama' => 'Mobilio E',
                'harga' => 190000000,
                'tahun' => 2019,
                'transmisi' => 'Manual',
                'bahan_bakar' => 'Bensin',
                'kilometer' => 47000,
                'deskripsi' => 'MPV keluarga dengan kapasitas penumpang 7 orang.',
                'status' => 'tersedia',
                'merek_id' => 2,
                'makelar_id' => 1,
            ],
            // Daihatsu
            [
                'nama' => 'Sigra R Deluxe',
                'harga' => 140000000,
                'tahun' => 2020,
                'transmisi' => 'Manual',
                'bahan_bakar' => 'Bensin',
                'kilometer' => 35000,
                'deskripsi' => 'Mobil LCGC murah dan cocok untuk keluarga kecil.',
                'status' => 'tersedia',
                'merek_id' => 3,
                'makelar_id' => 1,
            ],
            [
                'nama' => 'Ayla X',
                'harga' => 125000000,
                'tahun' => 2019,
                'transmisi' => 'Manual',
                'bahan_bakar' => 'Bensin',
                'kilometer' => 38000,
                'deskripsi' => 'City car murah dan irit bahan bakar.',
                'status' => 'tersedia',
                'merek_id' => 3,
                'makelar_id' => 1,
            ],
            [
                'nama' => 'Terios R Custom',
                'harga' => 240000000,
                'tahun' => 2021,
                'transmisi' => 'Manual',
                'bahan_bakar' => 'Bensin',
                'kilometer' => 29000,
                'deskripsi' => 'SUV tangguh dan stylish untuk segala kebutuhan.',
                'status' => 'tersedia',
                'merek_id' => 3,
                'makelar_id' => 1,
            ],
            [
                'nama' => 'Xenia R',
                'harga' => 185000000,
                'tahun' => 2020,
                'transmisi' => 'Manual',
                'bahan_bakar' => 'Bensin',
                'kilometer' => 45000,
                'deskripsi' => 'MPV dengan kenyamanan dan efisiensi tinggi.',
                'status' => 'tersedia',
                'merek_id' => 3,
                'makelar_id' => 1,
            ],
            [
                'nama' => 'Gran Max Pick Up',
                'harga' => 135000000,
                'tahun' => 2021,
                'transmisi' => 'Manual',
                'bahan_bakar' => 'Bensin',
                'kilometer' => 22000,
                'deskripsi' => 'Mobil niaga andalan untuk kebutuhan usaha.',
                'status' => 'tersedia',
                'merek_id' => 3,
                'makelar_id' => 1,
            ],
        ];

        foreach ($data as $item) {
            Katalog::create($item);
        }
    }
}
