<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembelian;

class pembelianController extends Controller
{
    public function index()
    {
        $penjualan = pembelian::all();

        return view('pembelian', ['transaksiList' => $penjualan]);
    }
}
