<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use App\Models\Produk;
use App\Models\ProdukBahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index()
    {
        $data = [
            'produk' => Produk::get(),
        ];
        return view('produk.index', $data);
    }

    public function create()
    {
        return view('produk.create');
    }

    public function store(Request $request)
    {
        $data = $request->post();
        $img = $request->file('gambar_produk');

        $randomName = uniqid() . '.' . $img->extension();
        $filePath = $img->move(public_path('uploads/gambar_produk/'), $randomName);

        $data['gambar_produk'] = $randomName;

        Produk::create($data);
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dibuat');
    }

    public function edit($id)
    {
        $data = [
            'produk' => Produk::find($id),
        ];

        return view('produk.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $data = $request->post();
        $img = $request->file('gambar_produk');

        if(isset($img) && $img->isFile()) {
            $produk = Produk::find($id);
            if ($produk && Storage::exists($produk->gambar_produk)) {
                Storage::delete($produk->gambar_produk);
            }

            $randomName = uniqid() . '.' . $img->extension();
            $filePath = $img->move(public_path('uploads/gambar_produk/'), $randomName);

            $data['gambar_produk'] = $randomName;
        }

        Produk::find($id)->update($data);
        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy($id)
    {
        $produk = Produk::find($id);
        if ($produk && Storage::exists($produk->gambar_produk)) {
            Storage::delete($produk->gambar_produk);
        }
        Produk::destroy($id);
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus');
    }

    public function bahan($id)
    {
        $produk_bahan = ProdukBahan::join('produk', 'produk.id', '=', 'produk_bahan.produk_id')
            ->join('bahan', 'bahan.id', '=', 'produk_bahan.bahan_id')
            ->join('satuan', 'satuan.id', '=', 'bahan.satuan_id')
            ->where('produk.id', $id)->select(['produk_bahan.*', 'bahan.nama_bahan', 'bahan.harga_satuan_bahan', 'bahan.stok_bahan', 'bahan.limit_bahan', 'satuan.kode_satuan'])->get();

        $data = [
            'produk' => Produk::find($id),
            'produk_bahan' => $produk_bahan,
        ];

        return view('produk.bahan.index', $data);
    }
}
