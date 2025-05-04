<?php

namespace App\Exports;

use App\Models\Penjualan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PenjualanExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Penjualan::join('produk', 'produk.id', '=', 'penjualan.produk_id')
            ->join('users', 'users.id', '=', 'penjualan.user_id')
            ->select(['penjualan.id', 'users.name', 'produk.nama_produk', 'produk.harga_produk', 'penjualan.jumlah', 'penjualan.tgl_jual', 'penjualan.layanan', 'penjualan.metode'])
            ->get();
    }

    public function headings(): array
    {
        return ['Kode Penjualan', 'Nama Kasir', 'Nama Produk', 'Harga', 'Jumlah', 'Tgl Jual', 'Layanan', 'Metode'];
    }
}
