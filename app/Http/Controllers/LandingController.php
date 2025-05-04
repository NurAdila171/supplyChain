<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use App\Models\BahanBahan;
use App\Models\Satuan;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing');
    }
}
