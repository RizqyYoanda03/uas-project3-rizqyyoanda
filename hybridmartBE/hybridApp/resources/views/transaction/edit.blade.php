@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Edit Produk</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/product">Produk</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Produk </li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-description">Ubah data :</p>
                    <form method="POST" action="/product/{{ $product->product_id }}">
                      @method('PUT')  
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputName1">Kode Produk:</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="kode_barang" value="{{ old('kode_barang',$product->kode_barang)}}" placeholder="Masukkan Kode Produk" />
                    </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Nama Produk:</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="product_name" value="{{ old('product_name',$product->product_name)}}" placeholder="Masukkan Nama Produk" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Kategori:</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="kategori" value="{{ old('kategori',$product->kategori)}}" placeholder="Masukkan Kategori" />
                        </div>  
                        <div class="form-group">
                            <label for="exampleInputName1">Harga:</label>
                            <input type="number" class="form-control" id="exampleInputName1" name="product_price" value="{{ old('product_price',$product->product_price)}}" placeholder="Masukkan Harga Produk" />
                        </div>
                        <div class="mb-2">
                            <input type="hidden" name="image_old" value="{{$product->product_image}}">
                            <label for="exampleInputName1" class="form-label"> File Upload</label>
                            @if($product->product_image)
                            <img id="file-preview" src="/images/{{$product->product_image}}" class="img-fulid col-sm-6 d-block mb-2" height="100" >
                            @else
                            <img id="file-preview" class="img-fulid col-sm-6 d-block mb-2" height="100" >
                            @endif
                            <input type="file" class="form-control @error('product_image') is-invalid @enderror" name="product_image" id="exampleInputName1">
                            @error('product_image')
                                  <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="exampleInputName1">Stok:</label>
                            <input type="number" class="form-control" id="exampleInputName1" name="quantity" value="{{ old('quantity',$product->quantity)}}" placeholder="Masukkan Jumlah Produk" />
                          </div>
                    <button type="submit" class="btn btn-primary mr-2"> Save </button>
                    <a href="{{ route('product.index') }}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection