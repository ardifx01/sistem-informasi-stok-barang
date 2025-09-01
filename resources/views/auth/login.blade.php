{{-- Halaman Login (Blade)
     - Dua kolom: kiri = banner, kanan = form.
     - Form di kanan di-center vertikal & horizontal, lebarnya dikunci agar proporsional.
     - Tidak ada scroll pada layar normal; pada layar kecil scroll diizinkan agar tetap usable.
--}}

<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login</title>

  {{-- Font dan ikon (ikon mata dari Bootstrap Icons) --}}
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

  {{-- CSS khusus halaman login --}}
  <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">

  {{-- Favicon (opsional) --}}
  <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
</head>
<body>
  {{-- Jika kamu pakai page loader component, panggil di sini (opsional) --}}
  {{-- <x-page-loader crest="{{ asset('assets/banner/logo_bupati.png') }}" brand="{{ asset('assets/banner/logo_stokita_01.png') }}"/> --}}

  <main class="page-wrap" role="main">
    <div class="panel" aria-label="Panel login">
      <section class="card">
        {{-- Kolom kiri: banner foto --}}
        <div class="card-left" aria-hidden="true">
          <img class="banner" src="{{ asset('assets/banner/login_banner.jpg') }}" alt="">
        </div>

        {{-- Kolom kanan: form login (dibatasi lebar, di-center) --}}
        <div class="card-right">
          <div class="form-box" role="form" aria-labelledby="login-title">
            <h1 id="login-title" class="title">LOGIN</h1>

            <form class="login-form" method="POST" action="{{ route('login') }}" novalidate>
              @csrf

              <label for="username">Username</label>
              <div class="field">
                <input
                  id="username"
                  name="username"
                  type="text"
                  placeholder="Masukkan Username . . ."
                  autocomplete="username"
                  required
                />
              </div>

              <label for="password">Password</label>
              <div class="field field-pass">
                <input
                  id="password"
                  name="password"
                  type="password"
                  placeholder="Masukkan Password . . ."
                  autocomplete="current-password"
                  required
                />
                {{-- Tombol toggle mata; JS akan ubah type password/text dan ikon eye/eye-slash --}}
                <button class="toggle-pass" type="button" aria-label="Tampilkan password" aria-pressed="false">
                  <i class="bi bi-eye-slash" aria-hidden="true"></i>
                </button>
              </div>

              <button class="btn" type="submit">LOGIN</button>
            </form>
          </div>
        </div>
      </section>
    </div>
  </main>

  {{-- JS untuk toggle mata (dipisah) --}}
  <script src="{{ asset('assets/js/login.js') }}"></script>
</body>
</html>
