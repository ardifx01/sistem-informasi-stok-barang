<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Kamu bisa override via .env bila mau
        $adminName  = env('ADMIN_NAME', 'Administrator');
        $adminUser  = env('ADMIN_USERNAME', 'admin');
        $adminPass  = env('ADMIN_PASSWORD', 'admin-1234');

        $pbName     = env('PB_NAME', 'Pengelola Barang');
        $pbUser     = env('PB_USERNAME', 'pb');
        $pbPass     = env('PB_PASSWORD', 'pb-1234');

        $pjName     = env('PJ_NAME', 'Penanggung Jawab');
        $pjUser     = env('PJ_USERNAME', 'pj');
        $pjPass     = env('PJ_PASSWORD', 'pj-1234');

        // Admin
        User::updateOrCreate(
            ['username' => $adminUser],
            [
                'nama'    => $adminName,
                'password'=> $adminPass,          // akan di-hash oleh casts('password' => 'hashed')
                // 'password'=> Hash::make($adminPass), // pakai ini kalau tidak pakai casts
                'role'    => 'Admin',
                'bagian'  => 'Umum',
            ]
        );

        // Pengelola Barang (PB)
        User::updateOrCreate(
            ['username' => $pbUser],
            [
                'nama'    => $pbName,
                'password'=> $pbPass,             // atau Hash::make($pbPass)
                'role'    => 'Pengelola Barang',
                'bagian'  => 'Gudang',
            ]
        );

        // Penanggung Jawab (PJ)
        User::updateOrCreate(
            ['username' => $pjUser],
            [
                'nama'    => $pjName,
                'password'=> $pjPass,             // atau Hash::make($pjPass)
                'role'    => 'Penanggung Jawab',
                'bagian'  => 'Operasional',
            ]
        );
    }
}
