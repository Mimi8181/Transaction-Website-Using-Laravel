@extends('layouts.mainlayout')
@section('title', 'dataProduk')

@section('content')

<div class="container">
    <div class="row">
        <div class="col mt-3">
            <h3>Yakin delete {{$barang->nama_barang}}</h3>

            <a href="/dataProduk" class="btn btn-primary">Cancel</a href="/dataProduk">

            <form style="display: inline-block" action="/produkDestroySoft/{{$barang->id}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>

@endsection