<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bahan extends Model
{
    use HasFactory;
    protected $table = 'bahan';
    protected $fillable = [
        'nama_bahan',
        'stok_bahan',
        'limit_bahan',
        'satuan_id',
        'harga_satuan_bahan',
    ];
}
