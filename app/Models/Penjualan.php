<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan';
    protected $fillable = [
        'user_id',
        'produk_id',
        'jumlah',
        'tgl_jual',
        'layanan',
        'metode',
    ];
}
