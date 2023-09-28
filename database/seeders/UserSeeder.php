<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'firstname' => "Surya",
            'lastname' => "Mirya",
            'phonenumber' => "089221234515",
            'provinsi' => "Jawa Barat",
            'kabkota' => "Bandung",
            'kecamatan' => "Antapani",
            'email' => "suryamirya@gmail.com",
            'password' => "suryaadmin",
            'role' => 'admin'
        ]);
        
        User::create([
            'firstname' => "Rizky",
            'lastname' => "Nur",
            'phonenumber' => "089422342772",
            'provinsi' => "Jawa Barat",
            'kabkota' => "Bandung",
            'kecamatan' => "Sukajadi",
            'email' => "rizkynur@gmail.com",
            'password' => "akurizky",
            'role' => 'user'
        ]);

        User::create([
            'firstname' => "Muhammad",
            'lastname' => "Nuh",
            'phonenumber' => "08972449234",
            'provinsi' => "Jawa Barat",
            'kabkota' => "Bandung",
            'kecamatan' => "Arcamanik",
            'email' => "muhnuh@gmail.com",
            'password' => "akumuhnuh",
            'role' => 'user'
        ]);

        User::create([
            'firstname' => "Muhammad",
            'lastname' => "Nuh",
            'phonenumber' => "08972449234",
            'provinsi' => "Dadadaws",
            'kabkota' => "Bandung",
            'kecamatan' => "Arcamanik",
            'email' => "rheyfan@gmail.com",
            'password' => "12345678",
            'role' => 'admin'
        ]);
    }
}
