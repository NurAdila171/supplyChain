<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;
    protected $table = 'pembelian';
    protected $fillable = [
        'user_id',
        'tgl_beli',
        'total',
        'layanan',
        'metode',
        'status',
    ];

    public function detail()
    {
        return $this->hasMany(PembelianDetail::class);
    }
}
