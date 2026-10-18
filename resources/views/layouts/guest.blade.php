<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ config('app.name') }}</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
@vite(['resources/css/app.css', 'resources/js/app.js'])
<link rel="stylesheet" href="{{ asset('css/pawcare.css') }}">
</head>
<body class="auth-body">
  <div class="auth-card">
    <div class="logo">
      <span class="paw">🐾</span>
      <h1>{{ config('app.name') }}</h1>
    </div>
    <div class="divider"></div>
    {{ $slot }}
  </div>
</body>
</html>
