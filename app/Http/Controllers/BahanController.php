<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use App\Models\Satuan;
use App\Models\BahanBahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BahanController extends Controller
{
    public function index()
    {
        $data = [
            'bahan' => Bahan::join('satuan', 'satuan.id', '=', 'bahan.satuan_id')->get(),
        ];
        return view('bahan.index', $data);
    }

    public function create()
    {
        $data = [
            'satuan' => Satuan::get(),
        ];
        return view('bahan.create', $data);
    }

    public function store(Request $request)
    {
        $data = $request->post();

        Bahan::create($data);
        return redirect()->route('bahan.index')->with('success', 'Bahan berhasil dibuat');
    }

    public function edit($id)
    {
        $data = [
            'bahan' => Bahan::find($id),
            'satuan' => Satuan::get(),
        ];

        return view('bahan.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $data = $request->post();

        Bahan::find($id)->update($data);
        return redirect()->route('bahan.index')->with('success', 'Bahan berhasil diperbarui');
    }

    public function destroy($id)
    {
        Bahan::destroy($id);
        return redirect()->route('bahan.index')->with('success', 'Bahan berhasil dihapus');
    }
}
