<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __invoke()
    {
        // Menu sesuai mockup Admin
        $menu = [
            ['label' => 'Dashboard', 'icon' => 'bi-grid-3x3-gap', 'route' => 'staff.admin.dashboard'],

            ['label' => 'Data Keseluruhan', 'icon' => 'bi-file-earmark-spreadsheet', 'children' => [
                ['label' => 'Gudang ATK',         'icon' => 'bi-grid', 'route' => 'staff.admin.dashboard'],
                ['label' => 'Gudang Listrik',     'icon' => 'bi-grid', 'route' => 'staff.admin.dashboard'],
                ['label' => 'Gudang Kebersihan',  'icon' => 'bi-grid', 'route' => 'staff.admin.dashboard'],
                ['label' => 'Gudang B Komputer',  'icon' => 'bi-grid', 'route' => 'staff.admin.dashboard'],
            ]],

            ['label' => 'Riwayat',        'icon' => 'bi-arrow-counterclockwise', 'route' => 'staff.admin.dashboard'],
            ['label' => 'Laporan',        'icon' => 'bi-receipt',                'route' => 'staff.admin.dashboard'],
            ['label' => 'Data Pengguna',  'icon' => 'bi-people',                 'route' => 'staff.admin.dashboard'],
        ];

        return view('staff.admin.dashboard', compact('menu'));
    }
}
