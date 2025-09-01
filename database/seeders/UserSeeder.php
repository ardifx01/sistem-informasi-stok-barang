<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\Hash; // kalau tidak pakai cast 'hashed'

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Boleh pakai ENV supaya mudah ganti credential tanpa ubah code
        $name     = env('ADMIN_NAME', 'Administrator');
        $username = env('ADMIN_USERNAME', 'admin');
        $password = env('ADMIN_PASSWORD', 'admin-1234'); // ganti di .env saat produksi

        // updateOrCreate agar aman diulang-ulang
        User::updateOrCreate(
            ['username' => $username],
            [
                'nama'     => $name,
                'password' => $password, // otomatis hash via casts() di model
                // 'password' => Hash::make($password), // gunakan ini jika casts() tidak dipakai
                'role'     => 'Admin',
            ]
        );
    }
}
