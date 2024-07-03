@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Edit Produk</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/stok">Stok</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Produk </li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-description">Ubah data :</p>
                        <form method="POST" action="/stok/{{ $stok->stok_id }}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            {{-- <div class="form-group">
                                <label for="exampleInputName1">Kode Produk:</label>
                                <input type="text" class="form-control" id="exampleInputName1" name="kode_barang"
                                    value="{{ old('kode_barang', $stok->kode_barang) }}"
                                    placeholder="Masukkan Kode Produk" />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Nama Produk:</label>
                                <input type="text" class="form-control" id="exampleInputName1" name="product_name"
                                    value="{{ old('product_name', $stok->product_name) }}"
                                    placeholder="Masukkan Nama Produk" />
                            </div> --}}
                            {{-- <div class="mb-2">
                                <div class="row">
                                    <div class="col-md-9">
                                        <label for="nama_kategori" class="form-label">Nama Kategori :</label>
                                    </div>
                                    <div class="col-md-12">
                                        <select class="form-select form-control @error('kategori_id') is-invalid @enderror"
                                            name="kategori_id">
                                            @foreach ($kategoris as $kategori)
                                                @if (old('kategori_id', $kategori->kategori_id) == $kategori->kategori_id)
                                                    <option value="{{ $kategori->kategori_id }}" selected>
                                                        {{ $kategori->nama_kategori }}</option>
                                                @else
                                                    <option value="{{ old('kategori_id'). $kategori->kategori_id }}">
                                                        {{ $kategori->nama_kategori }}
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
                            </div> --}}
                            <div class="form-group">
                                <label for="exampleInputName1">Harga:</label>
                                <input type="number" class="form-control" id="exampleInputName1" name="product_price"
                                    value="{{ old('product_price', $stok->product_price) }}"
                                    placeholder="Masukkan Harga Produk" />
                            </div>
                            <div class="mb-2">
                                <input type="hidden" name="gambar" value="{{ old('gambar' ,$stok->gambar) }}">
                                <label for="exampleInputName1" class="form-label"> File Upload :</label>
                                <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                                    name="gambar" id="exampleInputName1">
                                @error('gambar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Stok:</label>
                                <input type="number" class="form-control" id="exampleInputName1" name="quantity"
                                    value="{{ old('quantity', $stok->quantity) }}" placeholder="Masukkan Jumlah Produk" />
                            </div>
                            <button type="submit" class="btn btn-primary mr-2"> Save </button>
                            <a href="{{ route('stok.index') }}" class="btn btn-light">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
