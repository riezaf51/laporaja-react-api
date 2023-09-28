<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KontakPenting;

class KontakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KontakPenting::create([
            'admin_id' => 1,
            'namainstansi'=> 'Rumah Sakit Umum Bina Sehat',
            'nomortelepon'=> '(022) 5207964',
            'alamat' => 'Dayeuhkolot, Kabupaten Bandung, Jawa Barat',
            'jenisinstansi' => 'Rumah Sakit',
        ]);

        KontakPenting::create([
            'admin_id' => 1,
            'namainstansi'=> 'Polsek Dayeuhkolot',
            'nomortelepon'=> '(022) 5206316',
            'alamat' => 'Buah Batu, Kabupaten Bandung, Jawa Barat',
            'jenisinstansi' => 'Kantor Polisi',
        ]);

        KontakPenting::create([
            'admin_id' => 1,
            'namainstansi'=> 'RS Sartika Asih Bandung',
            'nomortelepon'=> '(022) 5229544',
            'alamat' => 'Regol, Kabupaten Bandung, Jawa Barat',
            'jenisinstansi' => 'Rumah Sakit',
        ]);

        KontakPenting::create([
            'admin_id' => 1,
            'namainstansi'=> 'Polsek Banjaran',
            'nomortelepon'=> '(022) 5940398',
            'alamat' => 'Banjaran, Kabupaten Bandung, Jawa Barat',
            'jenisinstansi' => 'Kantor Polisi',
        ]);

        KontakPenting::create([
            'admin_id' => 1,
            'namainstansi'=> 'Dinas Pemadam Kebakaran dan Penyelamatan',
            'nomortelepon'=> '(022) 5891113',
            'alamat' => 'Soreang, Kabupaten Bandung, Jawa Barat',
            'jenisinstansi' => 'Kantor Pemadam',
        ]);
    }
}
