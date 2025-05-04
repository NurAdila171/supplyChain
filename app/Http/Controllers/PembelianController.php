<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Notifikasi;
use App\Models\Pembelian;
use App\Models\Bahan;
use App\Models\PembelianDetail;
use App\Models\PembelianPembelian;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function index()
    {
        $data = [
            'pembelian' => Pembelian::join('users', 'users.id', '=', 'pembelian.user_id')->select(['users.name', 'pembelian.*'])->get(),
        ];
        return view('pembelian.index', $data);
    }

    public function show($id)
    {
        $data = [
            'pembelian_detail' => PembelianDetail::join('pembelian', 'pembelian_detail.pembelian_id', '=', 'pembelian.id')
                ->join('bahan', 'bahan.id', '=', 'pembelian_detail.bahan_id')
                ->join('satuan', 'satuan.id', '=', 'bahan.satuan_id')
                ->select(['pembelian_detail.*', 'bahan.nama_bahan', 'bahan.harga_satuan_bahan', 'satuan.kode_satuan'])
                ->get(),
        ];
        return view('pembelian.show', $data);
    }

    public function destroy($id)
    {
        Pembelian::destroy($id);
        return redirect()->route('pembelian.index')->with('success', 'Pembelian berhasil dihapus');
    }

    public function set_delivered($id)
    {
        $pembelian = Pembelian::find($id);
        $pembelian->update(['status' => 'sampai']);
        Notifikasi::create(['user_id' => Auth()->id(), 'to_role' => 'supplier', 'judul' => 'Stok Telah Sampai', 'pesan' => 'Pengiriman telah diterima (kode: ' . $pembelian->id . ')']);

        foreach ($pembelian->detail as $row) {
            $bahan = Bahan::find($row->bahan_id);
            $bahan->update(['stok_bahan' => $bahan->stok_bahan + $row->jumlah]);
        }

        return redirect()->route('pembelian.index')->with('success', 'Status pembelian telah sampai');
    }

    public function beli()
    {
        $data = [
            'bahan' => Bahan::join('satuan', 'satuan.id', '=', 'bahan.satuan_id')->select(['bahan.*', 'satuan.kode_satuan'])->get(),
        ];

        return view('pembelian.beli', $data);
    }

    public function tambah_keranjang(Request $request)
    {
        $data = $request->post();
        $keranjang = Keranjang::where(['bahan_id' => $data['bahan_id']]);
        if($keranjang->doesntExist())
            Keranjang::insert(['bahan_id' => $data['bahan_id'], 'jumlah' => $data['jumlah']]);
        else
            $keranjang->update(['jumlah' => $keranjang->first()->jumlah + $data['jumlah']]);

        return response()->json(['status' => 'success']);
    }

    public function keranjang()
    {
        $data = [
            'keranjang' => Keranjang::join('bahan', 'bahan.id', '=', 'keranjang.bahan_id')->join('satuan', 'satuan.id', '=', 'bahan.satuan_id')->select(['bahan.nama_bahan', 'bahan.harga_satuan_bahan', 'satuan.kode_satuan', 'keranjang.*'])->get(),
        ];
        return view('pembelian.keranjang', $data);
    }

    public function hapus_keranjang($id)
    {
        Keranjang::destroy($id);
        return redirect()->route('pembelian.keranjang');
    }

    public function proses_keranjang(Request $request)
    {
        $dataPost = $request->post();

        $keranjang = Keranjang::join('bahan', 'bahan.id', '=', 'keranjang.bahan_id')->select(['bahan.nama_bahan', 'bahan.harga_satuan_bahan', 'keranjang.*'])->get();
        if($keranjang->count() == 0)
            return redirect()->route('pembelian.keranjang')->with('error', 'Keranjang kosong');

        $total = 0;
        foreach ($keranjang as $row) {
            $total += $row->harga_satuan_bahan * $row->jumlah;
        }

        $pembelianId = Pembelian::insertGetId(['user_id' => Auth()->id(), 'total' => $total, 'layanan' => $dataPost['layanan'], 'metode' => $dataPost['metode']]);
        foreach ($keranjang as $row) {
            PembelianDetail::insert(['pembelian_id' => $pembelianId, 'bahan_id' => $row->bahan_id, 'jumlah' => $row->jumlah]);
        }
        Keranjang::truncate();

        Notifikasi::create(['user_id' => Auth()->id(), 'to_role' => 'admin', 'judul' => 'Stok Telah Dikirim', 'pesan' => 'Pengiriman telah diproses, harap menunggu (kode: ' . $pembelianId . ')']);

        return redirect()->route('pembelian.index')->with('success', 'Keranjang berhasil diproses');
    }
}
