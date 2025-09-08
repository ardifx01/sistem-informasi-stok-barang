@props([
  'title' => 'Stokita',
  'menu'  => [],
  'summary' => [], // ← tambahin props summary
])

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>{{ $title }}</title>

  {{-- Font global --}}
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">

  {{-- Komponen lain boleh nge-push asset ke <head> --}}
  @stack('head')

  {{-- (opsional) CSS global app-mu --}}
  {{-- <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}"> --}}

  <style>
    /* fallback kecil untuk kartu konten */
    .card{background:#fff;border-radius:14px;padding:18px;box-shadow:0 10px 24px rgba(0,0,0,.06)}
  </style>
</head>
<body>

    {{-- Sidebar --}}
    <div class="sidebar d-flex flex-column p-3">
        <h4 class="mb-4"><i class="bi bi-box-seam"></i> Stokita</h4>
        @foreach ($menu as $item)
            @if (isset($item['children']))
                <div class="mb-2">
                    <span><i class="bi {{ $item['icon'] }}"></i> {{ $item['label'] }}</span>
                    <div class="ms-3">
                        @foreach ($item['children'] as $child)
                            <a href="{{ route($child['route']) }}">
                                <i class="bi {{ $child['icon'] }}"></i> {{ $child['label'] }}
                            </a>
                        @endforeach
                    </div>
                </div>
            @else
                <a href="{{ route($item['route']) }}" class="{{ $loop->first ? 'active' : '' }}">
                    <i class="bi {{ $item['icon'] }}"></i> {{ $item['label'] }}
                </a>
            @endif
        @endforeach

        <div class="logout-btn">
            <a href="#" class="btn btn-light w-100"><i class="bi bi-box-arrow-right"></i> Logout</a>
        </div>
    </div>

    {{-- Content --}}
    <div class="content">
        <h2 class="mb-4">Dashboard Admin</h2>

        {{-- Ringkasan --}}
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card card-summary p-4">
                    <h3>{{ $summary['totalJenisBarang'] }}</h3>
                    <p>Total Jenis Barang</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-summary p-4">
                    <h3>{{ $summary['totalBarang'] }}</h3>
                    <p>Total Barang</p>
                </div>
            </div>
        </div>

        {{-- Grafik --}}
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card p-3">
                    <h5>Grafik Per Bagian</h5>
                    <canvas id="barChart"></canvas>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card p-3">
                    <h5>Grafik Pemasukan & Pengeluaran</h5>
                    <canvas id="lineChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    {{-- ChartJS --}}
    <script>
        // Grafik Per Bagian
        new Chart(document.getElementById('barChart'), {
            type: 'bar',
            data: {
                labels: ['Bagian 1','Bagian 2','Bagian 3','Bagian 4'],
                datasets: [
                    { label: 'Keluar', data: [120, 90, 60, 100], backgroundColor: 'red' },
                    { label: 'Masuk',  data: [150, 80, 70, 130], backgroundColor: 'green' }
                ]
            }
        });

        // Grafik Pemasukan & Pengeluaran
        new Chart(document.getElementById('lineChart'), {
            type: 'bar',
            data: {
                labels: ['2020','2021','2022'],
                datasets: [
                    { label: 'Barang Masuk', data: [50, 70, 90], backgroundColor: '#0d6efd' },
                    { label: 'Barang Keluar', data: [30, 60, 80], backgroundColor: '#6f42c1' }
                ]
            }
        });
    </script>
</body>
</html>