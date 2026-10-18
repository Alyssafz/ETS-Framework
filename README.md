# Cara pasang (setelah Breeze terpasang)

Salin isi folder ini ke project dan timpa file yang sama:

  app/Models/Barang.php
  app/Http/Requests/BarangRequest.php
  app/Http/Controllers/BarangController.php
  routes/web.php
  public/css/pawcare.css
  resources/views/components/pawcare-layout.blade.php
  resources/views/layouts/guest.blade.php
  resources/views/auth/login.blade.php
  resources/views/auth/register.blade.php
  resources/views/barang/*
  resources/views/vendor/pagination/report.blade.php

Lalu:
  php artisan optimize:clear
  php artisan serve

Nama di sidebar dan halaman login diambil dari APP_NAME di .env.
Tabel `barangs` harus punya kolom: nama_barang, harga, qty.
