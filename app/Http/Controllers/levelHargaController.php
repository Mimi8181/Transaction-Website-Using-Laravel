<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\levelHarga;

class levelHargaController extends Controller
{
    public function index()
    {
        $diskon = levelHarga::all();

        return view('level_harga', ['diskon' => $diskon]);
    }
}
