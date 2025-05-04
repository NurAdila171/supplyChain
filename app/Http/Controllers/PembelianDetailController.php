<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use App\Models\Pembelian;
use App\Models\PembelianPembelian;
use Illuminate\Http\Request;

class PembelianDetailController extends Controller
{
    public function index()
    {
        $data = [
            'pembelian' => Pembelian::get(),
        ];
        return view('pembelian.index', $data);
    }

    public function create()
    {
        $data = [
            'bahan' => Bahan::get(),
        ];
        return view('pembelian.create', $data);
    }

    public function store(Request $request)
    {
        $data = $request->post();

        $bahan = Bahan::find($data['bahan_id']);
        $bahan->update(['stok_bahan' => $bahan['stok_bahan'] + $data['jumlah']]);

        Pembelian::create($data);
        return redirect()->route('pembelian.index');
    }

    public function edit($id)
    {
        $data = [
            'pembelian' => Pembelian::find($id),
        ];

        return view('pembelian.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $data = $request->post();

        Pembelian::find($id)->update($data);
        return redirect()->route('pembelian.index');
    }

    public function destroy($id)
    {
        Pembelian::destroy($id);
        return redirect()->route('pembelian.index');
    }
}
