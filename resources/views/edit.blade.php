@extends('layouts.mainlayout')
@section('title', 'Etalase')

@section('content')
<div class="container">
    <div class="row mt-3">
        <div class="col">

            <form action="/dataProduk/{{$barang->id}}" method="POST">
                @csrf
                @method('PUT')
                <label for="nama_barang">nama</label>
                <input type="text " class="form-control" name="nama_barang" id="nama_barang" value="{{$barang->nama_barang}}" required>

                <label for="keterangan">keterangan</label>
                <input type="text " class="form-control" name="keterangan" id="keterangan" value="{{$barang->keterangan}}">

                <div>
                    <label for="satuan">Satuan</label>
                    <select name="satuan" id="satuan" class="form-control" required>
                        <option value="{{$barang->satuan}}">{{$barang->satuan}}</option>
                        <option value="pcs">pcs</option>
                        <option value="kg">kg</option>
                        <option value="ltr">ltr</option>
                        <option value="dus">dus</option>
                        <option value="dus">jasa</option>
                    </select>
                </div>

                <div>
                    <label for="kategori">Kategori</label>
                    <select name="kategori_id" id="kategori" class="form-control" required>
                        <option value="{{$barang->kategori->id}}">{{$barang->kategori->nama_level}}</option>
                        @foreach ($kategori as $item)
                        <option value="{{$item->id}}">{{$item->nama_level}}</option>
                        @endforeach
                    </select>
                </div>

                <label for="harga_dasar">harga_dasar</label>
                <input type="number " class="form-control" name="harga_dasar" id="harga_dasar" value="{{$barang->harga_dasar}}" required>

                <label for="harga_jual">harga_jual</label>
                <input type="number " class="form-control" name="harga_jual" id="harga_jual" value="{{$barang->harga_jual}}" required>

                <label for="stok">Stok</label>
                <input type="number " class="form-control" name="stok" id="stok" value="{{$barang->stok}}" required>

        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success mt-3">Update</button>
        </div>
        </form>

    </div>
</div>
</div>
@endsection