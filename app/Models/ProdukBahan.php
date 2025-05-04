<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukBahan extends Model
{
    use HasFactory;
    protected $table = 'produk_bahan';
    protected $fillable = [
        'produk_id',
        'bahan_id',
        'kebutuhan_bahan',
    ];
}
