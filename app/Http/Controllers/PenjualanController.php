<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualan = penjualan::all();

        return view('penjualan', ['transaksiList' => $penjualan]);
    }
}
