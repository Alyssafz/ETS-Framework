@props(['title' => 'Halaman', 'subtitle' => null])
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ $title }} — {{ config('app.name') }}</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/pawcare.css') }}">
</head>
<body>

<nav class="sidebar">
  <div class="sidebar-logo">
    <h1>Manajemen Barang</h1>
  </div>

  <div class="nav-section">
    <div class="nav-label">Menu</div>
    <a href="{{ route('barang.index') }}" class="nav-item {{ request()->routeIs('barang.*') ? 'active' : '' }}">
      Data Barang
    </a>
    <a href="{{ route('profile.edit') }}" class="nav-item {{ request()->routeIs('profile.*') ? 'active' : '' }}">
      Profil
    </a>
  </div>

  <div class="sidebar-footer">
    <div class="user-box">
      <small>Login sebagai</small>
      <strong>{{ Auth::user()->name }}</strong>
    </div>
    <form method="POST" action="{{ route('logout') }}" onsubmit="return confirm('Yakin mau logout?')">
      @csrf
      <button type="submit" class="btn-logout">Logout</button>
    </form>
  </div>
</nav>

<main class="main">
  <div class="page-header">
    <div>
      <div class="page-title">{{ $title }}</div>
      @if ($subtitle)<div class="page-subtitle">{{ $subtitle }}</div>@endif
    </div>
    @isset($actions){{ $actions }}@endisset
  </div>

  {{ $slot }}
</main>

@if (session('success'))
  <div class="toast-container">
    <div class="toast show" id="flashToast" role="status">{{ session('success') }}</div>
  </div>
  <script>
    setTimeout(function () {
      var t = document.getElementById('flashToast');
      if (t) { t.classList.remove('show'); setTimeout(function () { t.remove(); }, 350); }
    }, 3000);
  </script>
@endif

</body>
</html>
