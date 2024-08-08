<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\stok_barang;
use App\Models\kategori;


class stokBarangController extends Controller
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

        return view('dataProduk', ['barang' => $barang, 'kategori' => $kategori]);
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
        $barang->stok = $request->stok;
        $barang->save();

        if ($barang) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil ditambah');
        }

        // mass assignment
        // $barang->create($request->all());

        return  redirect('/dataProduk');
    }


    public function edit(Request $request, $id)
    {
        $barang = stok_barang::with('kategori')->findOrFail($id);
        $kategori = kategori::where('id', '!=', $barang->kategori_id)->get(['id', 'nama_level']);
        return view('edit', ['barang' => $barang, 'kategori' => $kategori]);
    }


    public function update(Request $request, $id)
    {
        $barang = stok_barang::findOrFail($id);

        $barang->nama_barang = $request->nama_barang;
        $barang->satuan = $request->satuan;
        $barang->harga_dasar = $request->harga_dasar;
        $barang->harga_jual = $request->harga_jual;
        $barang->keterangan = $request->keterangan;
        $barang->kategori_id = $request->kategori_id;
        $barang->stok = $request->stok;
        $barang->save();

        return redirect('/dataProduk');
    }


    public function delete($id)
    {
        $barang = stok_barang::findOrFail($id);
        return view('deleteBarang', ['barang' => $barang]);
    }


    public function destroySoft($id)
    {
        $deletedBarang = stok_barang::findOrFail($id);
        $deletedBarang->delete();
        return redirect('/dataProdukDeleted');
    }


    public function destroy($id)
    {
        $deletedBarang = DB::table('stok_barang')->where('id', $id)->delete();
        return redirect('/dataProdukDeleted');
    }


    public function SDelete()
    {
        $delete = stok_barang::onlyTrashed()->get();
        return view('barangSoftDeleted', ['barang' => $delete]);
    }

    public function restore($id)
    {
        $restore = stok_barang::withTrashed()->where('id', $id)->restore();
        if ($restore) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil dikembalikan');
        }
        return redirect('/dataProduk');
    }
}
