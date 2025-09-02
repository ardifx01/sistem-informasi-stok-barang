<?php

namespace App\Http\Controllers\Pj;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __invoke()
    {
        // Menu sesuai mockup PJ
        $menu = [
            ['label' => 'Dashboard', 'icon' => 'bi-grid-3x3-gap', 'route' => 'staff.pj.dashboard'],

            ['label' => 'Data Keseluruhan', 'icon' => 'bi-file-earmark-spreadsheet', 'children' => [
                ['label' => 'Gudang ATK',        'icon' => 'bi-grid', 'route' => 'staff.pj.dashboard'],
                ['label' => 'Gudang B Komputer', 'icon' => 'bi-grid', 'route' => 'staff.pj.dashboard'],
            ]],

            ['label' => 'Riwayat', 'icon' => 'bi-arrow-counterclockwise', 'route' => 'staff.pj.dashboard'],
        ];

        return view('staff.pj.dashboard', compact('menu'));
    }
}
