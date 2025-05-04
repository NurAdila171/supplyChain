<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use App\Models\Produk;
use App\Models\ProdukBahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukBahanController extends Controller
{
    public function create($produk_id)
    {
        $data = [
            'produk' => Produk::find($produk_id),
            'bahan' => Bahan::get(),
        ];
        return view('produk.bahan.create', $data);
    }

    public function store(Request $request, $produk_id)
    {
        $data = $request->post();

        $data['produk_id'] = $produk_id;

        ProdukBahan::create($data);
        return redirect()->route('produk.bahan', [$produk_id]);
    }

    public function edit($produk_id, $id)
    {
        $data = [
            'produk' => Produk::find($produk_id),
            'bahan' => Bahan::get(),
            'produk_bahan' => ProdukBahan::find($id),
        ];

        return view('produk.bahan.edit', $data);
    }

    public function update(Request $request, $produk_id, $id)
    {
        $data = $request->post();

        ProdukBahan::find($id)->update($data);
        return redirect()->route('produk.bahan', [$produk_id]);
    }

    public function destroy($produk_id, $id)
    {
        ProdukBahan::destroy($id);
        return redirect()->route('produk.bahan', [$produk_id]);
    }
}
