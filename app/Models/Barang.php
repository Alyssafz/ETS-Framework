<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    // Mass assignment protection: hanya kolom ini yang boleh diisi massal
    protected $fillable = ['nama_barang', 'harga', 'qty'];
}
