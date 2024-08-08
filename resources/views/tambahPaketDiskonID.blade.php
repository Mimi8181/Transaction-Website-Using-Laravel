@extends('layouts.mainlayout')
@section('title', 'Etalase')

@section('content')
<div class="container">
    <div class="row mt-3">
        <div class="col">

            <form action="/PDEdit/{{$barang->id}}" method="POST">
                @csrf
                @method('POST')

                <label for="">Harga Awal</label>
                <input type="number " class="form-control" name="harga_jual" id="harga_jual" value="{{$barang->harga_jual}}" required disabled>

                <label for="syarat_diskon">Syarat</label>
                <input type="number " class="form-control" name="syarat_diskon" id="syarat_diskon" required>

                <label for="potongan_harga">Potongan</label>
                <input type="number " class="form-control" name="potongan_harga" id="potongan_harga" required>

                <label for="harga_diskon">Harga Diskon</label>
                <input type="number " class="form-control" name="stok" id="stok" value="{{$barang->stok}}" required>

        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success mt-3">Terapkan</button>
        </div>
        </form>

    </div>
</div>
</div>
@endsection