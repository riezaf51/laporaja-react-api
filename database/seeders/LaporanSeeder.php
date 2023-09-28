<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Laporan;

class LaporanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Laporan::create([
            'judul' => "Tolong ada maling",
            'user_id' => 2,
            'alamat' => "Jl. Sukasari",
            'provinsi' => "Jawa Barat",
            'kabkota' => "Bandung",
            'kecamatan' => "Sukajadi",
            'deskripsi' => "Motor saya kemalingan",
            'status' => 'selesai',
        ]);

        Laporan::create([
            'judul' => "Butuh uang cicilan",
            'user_id' => 3,
            'alamat' => "Jl. Golf",
            'provinsi' => "Jawa Barat",
            'kabkota' => "Bandung",
            'kecamatan' => "Arcamanik",
            'deskripsi' => "Tolong banget saya butuh uang",
            'status' => 'ditolak',
        ]);
    }
}
