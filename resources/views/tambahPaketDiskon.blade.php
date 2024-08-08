@extends('layouts.mainlayout')
@section('title', 'Etalase')

@section('content')
<div class="container">
    <div class="row mt-3">
        <div class="col">

            <div class="my-3 col-12 col-sm-8 col-md-6">
                <form action="" method="get">
                    <div class="input-group mb-3">
                        <input class="form-control" type="text" placeholder="Nama Barang" id="floatingInputGroup1" name="keyword">
                        <button class="input-group-text btn btn-outline-success">Search</button>
                        <a href="/etalase" class="btn btn-outline-success">Refresh</a>
                    </div>
                </form>
            </div>

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
                        <th>diskon</th>
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
                        <td><a href="tambahPD/{{$data->id}}">Tambah</a></td>

                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Nama Barang</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>


@endsection