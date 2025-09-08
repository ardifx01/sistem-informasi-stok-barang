<?php

namespace App\Http\Controllers\Pb;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __invoke()
    {
        // Menu sesuai mockup PB
        $menu = [
            ['label' => 'Dashboard', 'icon' => 'bi-grid-3x3-gap', 'route' => 'staff.pb.dashboard'],

            ['label' => 'Kelola Barang', 'icon' => 'bi-box', 'children' => [
                ['label' => 'Gudang ATK',        'icon' => 'bi-grid', 'route' => 'staff.pb.dashboard'],
                ['label' => 'Gudang B Komputer', 'icon' => 'bi-grid', 'route' => 'staff.pb.dashboard'],
                ['label' => 'Gudang Kebersihan',  'icon' => 'bi-grid', 'route' => 'staff.admin.dashboard'],
                ['label' => 'Gudang B Komputer',  'icon' => 'bi-grid', 'route' => 'staff.admin.dashboard'],
            ]],

            ['label' => 'Riwayat', 'icon' => 'bi-arrow-counterclockwise', 'route' => 'staff.pb.dashboard'],
            ['label' => 'Laporan', 'icon' => 'bi-receipt',                'route' => 'staff.pb.dashboard'],
        ];

        return view('staff.pb.dashboard', compact('menu'));
    }
}
