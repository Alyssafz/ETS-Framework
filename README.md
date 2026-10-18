# Cara pasang (Laravel + Breeze)

1. Commit project ke git dulu (Breeze menimpa beberapa file).
2. Pasang autentikasi:
   composer require laravel/breeze --dev
   php artisan breeze:install blade
   npm install && npm run build
3. Salin isi folder ini ke project, timpa file yang sama:
   app/Models/Barang.php
   app/Http/Requests/BarangRequest.php
   app/Http/Controllers/BarangController.php
   routes/web.php
   resources/views/barang/*
   public/css/barang.css
4. Jalankan migrasi:
   php artisan migrate
5. Jalankan server:
   php artisan serve
   Buka /register untuk buat akun, lalu /barang.

Catatan: tabel `barangs` harus punya kolom nama_barang, harga, qty.
File report-table.css milikmu tidak kutimpa; gaya baru ada di barang.css.
