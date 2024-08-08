@extends('layouts.mainlayout')
@section('title', 'dataProduk')

@section('content')

<div class="container">
    <div class="row mt-3">
        <div class="col">
            <h3>Daftar Barang</h3>


            <div class="my-3 col-12 col-sm-8 col-md-6">
                <form action="" method="get">
                    <div class="input-group mb-3">
                        <input class="form-control" type="text" placeholder="Nama Barang" id="floatingInputGroup1" name="keyword">
                        <button class="input-group-text btn btn-outline-success">Search</button>
                    </div>
                </form>
            </div>


            <button type="button" class="btn btn-primary mt-3 mb-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Tambah Data
            </button>
            <a href="dataProdukDeleted" class="btn btn-info">Show Deleted Data</a>

            @if(Session::has('status'))
            <div class="alert alert-success" role="alert">
                {{Session::get('message')}}
            </div>
            @endif

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
                        <th>SDiskon</th>
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
                        <td><a href="dataEdit/{{$data->id}}">Edit</a>
                            <a href="produkDelete/{{$data->id}}">Delete All</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{$barang->withQueryString()->links()}}

        </div>
    </div>
</div>



<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Barang</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="dataProduk" method="post">
                    @csrf
                    <label for="nama_barang">nama</label>
                    <input type="text " class="form-control" name="nama_barang" id="nama_barang" required>

                    <label for="keterangan">keterangan</label>
                    <input type="text " class="form-control" name="keterangan" id="keterangan">

                    <div>
                        <label for="satuan">Satuan</label>
                        <select name="satuan" id="satuan" class="form-control" required>
                            <option value="">Pilih</option>
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
                            <option value="">Pilih</option>
                            @foreach ($kategori as $item)
                            <option value="{{$item->id}}">{{$item->nama_level}}</option>
                            @endforeach
                        </select>
                    </div>

                    <label for="harga_dasar">harga_dasar</label>
                    <input type="number " class="form-control" name="harga_dasar" id="harga_dasar" required>

                    <label for="harga_jual">harga_jual</label>
                    <input type="number " class="form-control" name="harga_jual" id="harga_jual" required>

                    <label for="stok">Stok</label>
                    <input type="number " class="form-control" name="stok" id="stok" required>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>



@endsection