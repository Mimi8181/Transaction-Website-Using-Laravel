<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\stok_barang;
use App\Models\kategori;
// use App\Models\etalase;


class etalaseController extends Controller
{

    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $barang = stok_barang::with('kategori')
            ->where('nama_barang', 'LIKE', '%' . $keyword . '%')
            ->orWhere('keterangan', $keyword)
            ->orWhereHas('kategori', function ($query) use ($keyword) {
                $query->where('nama_level', 'LIKE', '%' . $keyword . '%');
            })
            ->paginate(10);

        $kategori = kategori::select('id', 'nama_level')->get();

        return view('etalase', ['barang' => $barang, 'kategori' => $kategori]);
    }


    public function store(Request $request)
    {
        $barang = new stok_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->satuan = $request->satuan;
        $barang->harga_dasar = $request->harga_dasar;
        $barang->harga_jual = $request->harga_jual;
        $barang->keterangan = $request->keterangan;
        $barang->kategori_id = $request->kategori_id;
        $barang->save();

        return  redirect('/etalase');
    }
}
