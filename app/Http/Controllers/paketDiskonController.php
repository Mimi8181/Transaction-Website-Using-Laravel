<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\paketDiskon;
use App\Models\stok_barang;
use App\Models\kategori;

class paketDiskonController extends Controller
{
    public function index()
    {
        $diskon = paketDiskon::all();

        return view('Paket_Diskon', ['diskon' => $diskon]);
    }
    // SELECT * FROM `paket_diskon` WHERE 1

    public function tambah(Request $request)
    {
        $diskon = paketDiskon::all();
        // $hargaAwal = DB::table('paket_diskon')
        // ->join('stok_barang', 'stok_barang.id', '=', 'paket_diskon.id')
        // ->select('stok_barang.*')
        // ->get();
        $keyword = $request->keyword;

        $barang = stok_barang::with(['kategori'])
            ->where('nama_barang', 'LIKE', '%' . $keyword . '%')
            ->orWhere('keterangan', $keyword)
            ->orWhereHas('kategori', function ($query) use ($keyword) {
                $query->where('nama_level', 'LIKE', '%' . $keyword . '%');
            })
            ->paginate(10);

        $kategori = kategori::select('id', 'nama_level')->get();

        return view('tambahPaketDiskon', [
            'barang' => $barang, 'kategori' => $kategori, 'diskon' => $diskon
            // 'hargaAwal' => $hargaAwal
        ]);
    }


    public function tambahDiskonID(Request $request, $id)
    {
        $barang = stok_barang::with('kategori')->findOrFail($id);
        $kategori = kategori::where('id', '!=', $barang->kategori_id)->get(['id', 'nama_level']);
        $diskon = paketDiskon::all();

        return view('tambahPaketDiskonID', ['diskon' => $diskon, 'barang' => $barang, 'kategori' => $kategori]);
    }

    // public function edit(Request $request, $id)
    // {
    //     $barang = stok_barang::with('kategori')->findOrFail($id);
    //     $kategori = kategori::where('id', '!=', $barang->kategori_id)->get(['id', 'nama_level']);
    //     return view('edit', ['barang' => $barang, 'kategori' => $kategori]);
    // }

    public function update(Request $request, $id)
    {
        // $barang = stok_barang::findOrFail($id);

        // $barang->nama_barang = $request->nama_barang;
        // $barang->satuan = $request->satuan;
        // $barang->harga_dasar = $request->harga_dasar;
        // $barang->harga_jual = $request->harga_jual;
        // $barang->keterangan = $request->keterangan;
        // $barang->kategori_id = $request->kategori_id;
        // $barang->stok = $request->stok;
        // $barang->save();

        $diskon = new paketDiskon;

        $diskon->syarat_diskon = $request->syarat_diskon;
        $diskon->potongan_harga = $request->potongan_harga;
        $diskon->save();

        return redirect('/dataProduk');
    }
}
