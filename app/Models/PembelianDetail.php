<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianDetail extends Model
{
    use HasFactory;
    protected $table = 'pembelian_detail';
    protected $fillable = [
        'pembelian_id',
        'bahan_id',
        'jumlah',
    ];

    public function pembelian() {
        return $this->belongsTo(Pembelian::class);
    }
}
