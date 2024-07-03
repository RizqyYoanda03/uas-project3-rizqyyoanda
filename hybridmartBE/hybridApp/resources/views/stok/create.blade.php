@extends('layouts.app')

@section('title', 'Tambah Barang')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/stok">Produk</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Barang </li>
    </ol>
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <p class="card-description m-0 font-weight-bold text-primary">Isi data :</p>

                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('stok.store') }}" class="forms-sample"
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
                        <div class="mb-2">
                            <div class="row">
                                <div class="col-md-9">
                                    <label for="nama_kategori" class="form-label">Nama Kategori :</label>
                                </div>
                                <div class="col-md-12">
                                    <select class="form-select form-control @error('kategori_id') is-invalid @enderror"
                                        name="kategori_id">
                                        @foreach ($kategoris as $kategori)
                                            @if (old('kategori_id') == $kategori->kategori_id)
                                                <option value="{{ $kategori->kategori_id }}" selected>
                                                    {{ $kategori->nama_kategori }}</option>
                                            @else
                                                <option value="{{ $kategori->kategori_id }}">{{ $kategori->nama_kategori }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('kategori_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputName1">Harga:</label><br>
                            <input type="number" class="form-control" id="exampleInputName1" name="product_price"
                                placeholder="Masukkan Harga Produk" required>
                        </div>
                        <div class="mb-2">
                            <label for="gambar" class="form-label">File Upload :</label>
                            <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar"
                                id="gambar">
                            @error('gambar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Jumlah :</label><br>
                            <input type="number" class="form-control" id="exampleInputName1" name="quantity"
                                placeholder="Masukkan Jumlah Produk" required>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                        <a href="{{ route('stok.index') }}" class="btn btn-light">Cancel</a>
                </div>
            </div>
        </div>
    </div>
@endsection
