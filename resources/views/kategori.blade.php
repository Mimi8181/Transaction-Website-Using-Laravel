@extends('layouts.mainlayout')
@section('title', 'Kategori')

@section('content')






<div class="container">
    <div class="row mt-3">
        <div class="col">
            <h3>Daftar Kategori</h3>

            <button type="button" class="btn btn-primary mt-3 mb-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Tambah Data
            </button>

            @if(Session::has('status'))
            <div class="alert alert-success" role="alert">
                {{Session::get('message')}}
            </div>
            @endif

            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="kategori" method="post">
                                @csrf
                                <label for="nama_level">Nama Kategori</label>
                                <input type="text " class="form-control" name="nama_level" id="nama_level" required>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kategori as $data)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$data->nama_level}}</td>
                        <td>
                            <form style="display: inline-block" action="/kategoriDelete/{{$data->id}}" method="post">
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