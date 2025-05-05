<?php

namespace App\Http\Controllers;

use App\Models\Bahan; // Model untuk bahan baku
use App\Models\Pembelian; // Model untuk pembelian bahan
use App\Models\Penjualan; // Model untuk penjualan produk
use App\Models\Produk; // Model untuk produk
use App\Models\ProdukBahan; // Model relasi produk dengan bahan

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Middleware untuk memastikan user sudah login
    }

    public function index()
    {
        if(Auth()->user()->role == 'admin') { // Jika user adalah admin
            $produk_siomay = Produk::find(1); // Ambil data produk siomay (id = 1)
            $bahan_siomay = ProdukBahan::where('produk_id', 1)->get()->pluck('bahan_id'); // Ambil bahan-bahan siomay
            $produk_batagor = Produk::find(2); // Ambil data produk batagor (id = 2)

            $penjualan_siomay = Penjualan::join('produk', 'produk.id', '=', 'penjualan.produk_id') // Gabungkan tabel penjualan dan produk
                ->whereRaw('MONTH(tgl_jual) = ?', [date('m')]) // Filter berdasarkan bulan berjalan
                ->where('produk_id', 1) // Hanya untuk produk siomay
                ->groupByRaw('DATE(tgl_jual)') // Kelompokkan per tanggal penjualan
                ->selectRaw('DATE(tgl_jual) as tgl_jual, SUM(jumlah) as jumlah, SUM(jumlah) * ? as harga_total', [$produk_siomay->harga_produk]) // Hitung total jumlah dan harga
                ->get();

            $penjualan_batagor = Penjualan::join('produk', 'produk.id', '=', 'penjualan.produk_id') // Sama seperti siomay, untuk batagor
                ->whereRaw('MONTH(tgl_jual) = ?', [date('m')])
                ->where('produk_id', 2)
                ->groupByRaw('DATE(tgl_jual)')
                ->selectRaw('DATE(tgl_jual) as tgl_jual, SUM(jumlah) as jumlah, SUM(jumlah) * ? as harga_total', [$produk_batagor->harga_produk])
                ->get();

            $total_penjualan_siomay = Penjualan::join('produk', 'produk.id', '=', 'penjualan.produk_id') // Hitung total penjualan siomay bulan ini
                ->whereRaw('MONTH(tgl_jual) = ?', [date('m')])
                ->where('produk_id', 1)
                ->selectRaw('SUM(jumlah) * ? as harga_total', [$produk_batagor->harga_produk]) // ⚠️ Kemungkinan salah: seharusnya pakai $produk_siomay->harga_produk
                ->first();

            $total_penjualan_batagor = Penjualan::join('produk', 'produk.id', '=', 'penjualan.produk_id') // Total penjualan batagor bulan ini
                ->whereRaw('MONTH(tgl_jual) = ?', [date('m')])
                ->where('produk_id', 2)
                ->selectRaw('SUM(jumlah) * ? as harga_total', [$produk_batagor->harga_produk])
                ->first();

            $total_pembelian = Pembelian::whereRaw('MONTH(tgl_beli) = ?', [date('m')]) // Total pembelian bahan bulan ini
                ->selectRaw('SUM(total) as harga_total')
                ->first();

            $total_keuntungan = ($total_penjualan_siomay->harga_total + $total_penjualan_batagor->harga_total) - $total_pembelian->harga_total; // Hitung keuntungan bulan ini

            $data = [
                'count_penjualan' => Penjualan::count(), // Jumlah seluruh data penjualan
                'count_pembelian' => Pembelian::count(), // Jumlah seluruh data pembelian
                'tgl_penjualan' => Penjualan::whereRaw('MONTH(tgl_jual) = ?', [date('m')]) // Ambil tanggal-tanggal penjualan bulan ini
                    ->groupByRaw('DATE(tgl_jual)')
                    ->selectRaw('DATE(tgl_jual) as tgl_jual')
                    ->get(),
                'penjualan_siomay' => $penjualan_siomay, // Data penjualan si
