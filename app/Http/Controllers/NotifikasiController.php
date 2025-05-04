<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use App\Models\Notifikasi;
use App\Models\Satuan;
use Illuminate\Http\Request;

class NotifikasiController extends Controller
{
    public function index()
    {
        $notifikasi = Notifikasi::where('to_role', Auth()->user()->role)->orderBy('tgl_notifikasi', 'desc')->limit(6)->get();
        return view('notifikasi.index', ['notifikasi' => $notifikasi]);
    }
}
