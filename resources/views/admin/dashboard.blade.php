<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Admin • Dashboard (Sementara)</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
  <style>
    :root{
      --bg:#f5f7fb; --card:#fff; --ink:#1d2433; --muted:#7a8494; --accent:#1e73be;
    }
    *{box-sizing:border-box} html,body{height:100%}
    body{margin:0;font-family:Poppins,system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif;background:var(--bg);color:var(--ink);}
    .wrap{min-height:100%;display:grid;place-items:center;padding:32px}
    .card{width:min(920px,94vw);background:var(--card);border-radius:14px;padding:28px;box-shadow:0 10px 28px rgba(20,60,120,.12)}
    h1{margin:0 0 10px;font-size:clamp(22px,3.2vw,28px)}
    p{margin:0;color:var(--muted)}
    .meta{margin-top:16px;padding:12px 14px;background:#f1f6ff;border:1px solid #e2ebff;border-radius:10px}
    .btn{display:inline-block;margin-top:18px;background:var(--accent);color:#fff;padding:10px 16px;border-radius:10px;text-decoration:none;font-weight:700}
  </style>
</head>
<body>
  <main class="wrap">
    <section class="card" role="region" aria-label="Halaman Admin">
      <h1>Dashboard Admin (Placeholder)</h1>
      <p>Halo, <strong>{{ auth()->user()->nama ?? 'Admin' }}</strong> — halaman ini masih kosong. Let’s build it!</p>
      <div class="meta">
        <div>Role: <b>{{ auth()->user()->role ?? '-' }}</b></div>
        <div>Username: <b>{{ auth()->user()->username ?? '-' }}</b></div>
      </div>
      <a class="btn" href="{{ url('/') }}">Kembali ke Beranda</a>
    </section>
  </main>
</body>
</html>
