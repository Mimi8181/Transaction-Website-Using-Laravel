@extends('layouts.mainlayout')
@section('title', 'Transaksi')

@section('content')
<div class="container">
    <div class="row mt-3">
        <div class="col">

            <!-- Button trigger modal -->
            <a href="tambahPaketDiskon" class="btn btn-info">Tambah paket diskon</a>

            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Syarat</th>
                        <th>Potongan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($diskon as $data)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$data->syarat_diskon}}</td>
                        <td>{{$data->potongan_harga}}</td>
                        <td>
                            <a href="produkDelete/{{$data->id}}">Delete</a>
                        </td>
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Paket Diskon</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="paket_diskon" method="post">
                    @csrf
                    <label for="nama_barang">nama</label>
                    <input type="text " class="form-control" name="nama_barang" id="nama_barang" required>

                    <label for="keterangan">keterangan</label>
                    <input type="text " class="form-control" name="keterangan" id="keterangan">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>


@endsection