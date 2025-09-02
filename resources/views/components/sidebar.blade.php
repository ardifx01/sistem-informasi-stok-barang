@props([
  'brand'     => 'Stokita',
  'brandLogo' => asset('assets/logo_stokita_01.png'), // ← LOGO STOKITA
  'user'      => null,
  'items'     => [],  // [label, route?, icon?, children?]
])

@push('head')
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/components/sidebar.css') }}">
@endpush

<aside class="sb">
  <div class="sb-brand">
    <img class="brand-img" src="{{ $brandLogo }}" alt="{{ $brand }}" />
  </div>

  <nav class="sb-nav" role="navigation" aria-label="Menu Samping">
    @foreach ($items as $it)
      @php
        $active      = isset($it['route']) && request()->routeIs($it['route']);
        $hasChildren = !empty($it['children'] ?? []);
      @endphp

      <div class="sb-item {{ $active ? 'is-active' : '' }}">
        @if ($hasChildren)
          <details {{ $active ? 'open' : '' }}>
            <summary>
              @if(!empty($it['icon'])) <i class="bi {{ $it['icon'] }}"></i>@endif
              <span>{{ $it['label'] }}</span>
              <i class="bi bi-chevron-right caret" aria-hidden="true"></i>
            </summary>
            <div class="sb-children">
              @foreach ($it['children'] as $ch)
                <a href="{{ isset($ch['route']) ? route($ch['route']) : '#' }}"
                   class="sb-link {{ request()->routeIs($ch['route'] ?? '') ? 'is-active' : '' }}">
                  <span>{{ $ch['label'] }}</span>
                </a>
              @endforeach
            </div>
          </details>
        @else
          <a href="{{ isset($it['route']) ? route($it['route']) : '#' }}" class="sb-link">
            @if(!empty($it['icon'])) <i class="bi {{ $it['icon'] }}"></i>@endif
            <span>{{ $it['label'] }}</span>
          </a>
        @endif
      </div>
    @endforeach
  </nav>

  <div class="sb-footer">
    <div class="sb-user">
      <i class="bi bi-person-circle"></i>
      <div class="meta">
        <strong>{{ $user->nama ?? 'Pengguna' }}</strong>
        <small>{{ $user->role ?? '-' }}</small>
      </div>
    </div>

    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button class="sb-logout" type="submit"><i class="bi bi-box-arrow-right"></i> Logout</button>
    </form>
  </div>
</aside>
