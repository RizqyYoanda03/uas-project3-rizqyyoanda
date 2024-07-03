@extends('layouts.app')

@section('title', 'Checkout Barang')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/checkout">Checkout</a></li>
        <li class="breadcrumb-item active" aria-current="page">Checkout Barang </li>
    </ol>
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <p class="card-description m-0 font-weight-bold text-primary">Isi data :</p>

                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('checkout.store') }}" class="forms-sample"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="stok_id">Pilih Barang:</label>
                            <select name="stok_id" id="stok_id" class="form-control">
                                @foreach ($stoks as $item)
                                    <option value="{{ $item->stok_id }}">{{ $item->product_name }}</option>
                                @endforeach
                            </select>
                            @error('stok_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity:</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" required>
                            @error('quantity')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                        <a href="{{ route('checkout.index') }}" class="btn btn-light">Cancel</a>
                </div>
            </div>
        </div>
    </div>
@endsection
