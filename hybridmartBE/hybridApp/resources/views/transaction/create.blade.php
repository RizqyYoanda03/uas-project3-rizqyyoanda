@extends('layouts.app')

@section('title', 'Tambah Barang')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/product">Produk</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Barang </li>
    </ol>
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <p class="card-description m-0 font-weight-bold text-primary">Isi data :</p>

                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('product.store') }}" class="forms-sample"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputName1">Kode Produk:</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="kode_barang"
                                placeholder="Masukkan Kode Produk" required />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Nama Produk:</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="product_name"
                                placeholder="Masukkan Nama Produk" required />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Kategori:</label><br>
                            <input type="text" class="form-control" id="exampleInputName1" name="kategori"
                                placeholder="Masukkan Kategori Produk">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Harga:</label><br>
                            <input type="number" class="form-control" id="exampleInputName1" name="product_price"
                                placeholder="Masukkan Harga Produk" required>
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputName1" class="form-label">File Upload :</label>
                            <img id="file-preview" class="img-fluid col-sm-6 mb-3 d-block" height="100">
                            <input type="file" class="form-control @error('product_image') is-invalid @enderror"
                                name="product_image" id="exampleInputName1">
                            @error('product_image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Stok:</label><br>
                            <input type="number" class="form-control" id="exampleInputName1" name="quantity"
                                placeholder="Masukkan Jumlah Produk" required>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                        <a href="{{ route('product.index') }}" class="btn btn-light">Cancel</a>
                </div>
            </div>
        </div>
    </div>
@endsection
