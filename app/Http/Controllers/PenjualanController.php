<?php

namespace App\Http\Controllers;

use App\Exports\PenjualanExport;
use App\Models\Bahan;
use App\Models\Notifikasi;
use App\Models\Penjualan;
use App\Models\Produk;
use App\Models\ProdukBahan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PenjualanController extends Controller
{
    public function index()
    {
        $data = [
            'penjualan' => Penjualan::join('produk', 'produk.id', '=', 'penjualan.produk_id')->join('users', 'users.id', '=', 'penjualan.user_id')->select(['penjualan.*', 'produk.nama_produk', 'produk.harga_produk', 'users.name'])->get(),
        ];
        return view('penjualan.index', $data);
    }

    public function create()
    {
        $data = [
            'produk' => Produk::get(),
        ];

        return view('penjualan.create', $data);
    }

    public function store(Request $request)
    {
        $data = $request->post();

        $produk_bahan = ProdukBahan::join('produk', 'produk.id', '=', 'produk_bahan.produk_id')
            ->join('bahan', 'bahan.id', '=', 'produk_bahan.bahan_id')
            ->join('satuan', 'satuan.id', '=', 'bahan.satuan_id')
            ->where('produk.id', $data['produk_id'])->select(['produk_bahan.*', 'bahan.nama_bahan', 'bahan.harga_satuan_bahan', 'bahan.stok_bahan', 'satuan.kode_satuan'])->get();

        foreach ($produk_bahan as $row) {
            $bahan = Bahan::find($row->bahan_id);
            if($bahan->stok_bahan - ($row->kebutuhan_bahan * $data['jumlah']) < 0)
                return redirect()->route('penjualan.create')->with('error', 'Bahan tidak mencukupi !');
        }

        foreach ($produk_bahan as $row) {
            $bahan = Bahan::find($row->bahan_id);
            if($bahan->stok_bahan - ($row->kebutuhan_bahan * $data['jumlah']) < $bahan->limit_bahan) {
                Notifikasi::create(['user_id' => Auth()->id(), 'to_role' => 'supplier', 'judul' => 'Stok Hampir Habis', 'pesan' => 'Segera lakukan restok utk ' . $bahan->nama_bahan]);
            }
            $bahan->update(['stok_bahan' => $bahan->stok_bahan - ($row->kebutuhan_bahan * $data['jumlah'])]);
        }

        $data['user_id'] = Auth()->id();
        Penjualan::create($data);
        return redirect()->route('penjualan.index')->with('success', 'Penjualan berhasil dibuat');
    }

    public function destroy($id)
    {
        Penjualan::destroy($id);
        return redirect()->route('penjualan.index')->with('success', 'Penjualan berhasil dihapus');
    }

    public function exportToExcel()
    {
        return Excel::download(new PenjualanExport(), 'DataPenjualan_' . date('Ymd_His') . '.xlsx');
    }
}
