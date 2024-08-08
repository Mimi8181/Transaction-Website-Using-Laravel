@extends('layouts.mainlayout')
@section('title', 'dataProdukDeleted/barangDDel')

@section('content')

<div class="container">
    <div class="row">
        <div class="col mt-3">
            <a href="/dataProduk" class="btn btn-primary">Kembali</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Keterangan</th>
                        <th>Satuan</th>
                        <th>harga_Beli</th>
                        <th>Harga_Jual</th>
                        <th>Kategori</th>
                        <th>Action</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barang as $data)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$data->nama_barang}}</td>
                        <td>{{$data->keterangan}}</td>
                        <td>{{$data->satuan}}</td>
                        <td>{{$data->harga_dasar}}</td>
                        <td>{{$data->harga_jual}}</td>
                        <td> {{$data->kategori['nama_level']}}</td>
                        <td> {{$data->stok}}</td>
                        <td>
                            <a href="/dataProduk/{{$data->id}}/restore">Restore</a>
                            <form action="/produkDestroy/{{$data->id}}" style="display: inline-block;" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection