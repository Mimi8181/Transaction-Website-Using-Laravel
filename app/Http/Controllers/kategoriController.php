<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategori;
use Illuminate\Support\Facades\Session;

class kategoriController extends Controller
{
    public function index()
    {
        $kategori = kategori::with('barang')->get();

        return view('kategori', ['kategori' => $kategori]);
    }


    public function store(Request $request)
    {
        $barang = new kategori;
        $barang->nama_level = $request->nama_level;
        $barang->save();

        if ($barang) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil ditambah');
        }

        return  redirect('/kategori');
    }


    public function delete($id)
    {
        $delete = kategori::findOrFail($id);
        $delete->delete();

        if ($delete) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil dihapus');
        }

        return redirect('/kategori');
    }
}
