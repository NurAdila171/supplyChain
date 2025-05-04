<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use App\Models\Pembelian;
use App\Models\Penjualan;
use App\Models\Produk;
use App\Models\ProdukBahan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth()->user()->role == 'admin') {
            $produk_siomay = Produk::find(1);
            $bahan_siomay = ProdukBahan::where('produk_id', 1)->get()->pluck('bahan_id');
            $produk_batagor = Produk::find(2);

            $penjualan_siomay = Penjualan::join('produk', 'produk.id', '=', 'penjualan.produk_id')
                ->whereRaw('MONTH(tgl_jual) = ?', [date('m')])
                ->where('produk_id', 1)->groupByRaw('DATE(tgl_jual)')
                ->selectRaw('DATE(tgl_jual) as tgl_jual, SUM(jumlah) as jumlah, SUM(jumlah) * ? as harga_total', [$produk_siomay->harga_produk])
                ->get();
            $penjualan_batagor = Penjualan::join('produk', 'produk.id', '=', 'penjualan.produk_id')
                ->whereRaw('MONTH(tgl_jual) = ?', [date('m')])
                ->where('produk_id', 2)
                ->groupByRaw('DATE(tgl_jual)')->selectRaw('DATE(tgl_jual) as tgl_jual, SUM(jumlah) as jumlah, SUM(jumlah) * ? as harga_total', [$produk_batagor->harga_produk])
                ->get();

            $total_penjualan_siomay = Penjualan::join('produk', 'produk.id', '=', 'penjualan.produk_id')
                ->whereRaw('MONTH(tgl_jual) = ?', [date('m')])
                ->where('produk_id', 1)
                ->selectRaw('SUM(jumlah) * ? as harga_total', [$produk_batagor->harga_produk])
                ->first();
            $total_penjualan_batagor = Penjualan::join('produk', 'produk.id', '=', 'penjualan.produk_id')
                ->whereRaw('MONTH(tgl_jual) = ?', [date('m')])
                ->where('produk_id', 2)
                ->selectRaw('SUM(jumlah) * ? as harga_total', [$produk_batagor->harga_produk])
                ->first();
            $total_pembelian = Pembelian::whereRaw('MONTH(tgl_beli) = ?', [date('m')])
                ->selectRaw('SUM(total) as harga_total')
                ->first();

            $total_keuntungan = ($total_penjualan_siomay->harga_total + $total_penjualan_batagor->harga_total) - $total_pembelian->harga_total;

            $data = [
                'count_penjualan' => Penjualan::count(),
                'count_pembelian' => Pembelian::count(),
                'tgl_penjualan' => Penjualan::whereRaw('MONTH(tgl_jual) = ?', [date('m')])->groupByRaw('DATE(tgl_jual)')->selectRaw('DATE(tgl_jual) as tgl_jual')->get(),
                'penjualan_siomay' => $penjualan_siomay,
                'penjualan_batagor' => $penjualan_batagor,
                'total_penjualan_siomay' => $total_penjualan_siomay->harga_total,
                'total_penjualan_batagor' => $total_penjualan_batagor->harga_total,
                'total_pembelian' => $total_pembelian->harga_total,
                'total_keuntungan' => $total_keuntungan,
            ];
            return view('dashboard/admin', $data);
        } elseif(Auth()->user()->role == 'supplier') {
            $data = [
                'count_pembelian' => Pembelian::count(),
                'bahan' => Bahan::join('satuan', 'satuan.id', '=', 'bahan.satuan_id')->whereRaw('stok_bahan < limit_bahan')->orderBy('stok_bahan', 'asc')->limit(5)->get(),
            ];
            return view('dashboard/supplier', $data);
        } else {
            $data = [
                'count_penjualan' => Penjualan::count(),
                'bahan' => Bahan::join('satuan', 'satuan.id', '=', 'bahan.satuan_id')->whereRaw('stok_bahan < limit_bahan')->orderBy('stok_bahan', 'asc')->limit(5)->get(),
            ];
            return view('dashboard/kasir', $data);
        }
    }
}
