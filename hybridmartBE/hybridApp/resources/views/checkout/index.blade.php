@extends('layouts.app')

@section('title','Daftar Checkout')

@section('content')

@if (session()->has('pesan'))
    <div class="alert alert-success mt-3" role="alert">
        {{ session('pesan') }}
    </div>
@endif
@if (auth()->user()->role == 'Pelanggan')
<a href="/checkout/create" class="btn btn-primary"> <i class="fas fa-fw fa-plus-circle"></i>
    Checkout Disini </a>
    @endif
    <table class="table table-bordered table-sm my-4">
        <tr>
            <th class="text-center align-middle">No</th>
            <th class="text-center align-middle">Nama Barang</th>
            <th class="text-center align-middle">Jumlah</th>
            <th class="text-center align-middle">Harga</th>
            <th class="text-center align-middle">Gambar</th>
            @if (auth()->user()->role == 'Pelanggan')
            <th class="text-center align-middle">Aksi</th>
            @endif
        </tr>
        @foreach ($checkout as $item)
        <tr>
            <td class="text-center align-middle"> {{ $loop->iteration }}</td>
            <td class="text-center align-middle">{{ $item->stok->product_name }}</td>
            <td class="text-center align-middle">{{ $item->quantity }}</td>
            <td class="text-center align-middle">{{ $item->stok->product_price }}</td>
            <td class="text-center align-middle"><img src="{{ asset('img/' . $item->stok->gambar) }}" alt="{{ $item->stok->product_name }}"  style="width: 95px; height: 120px"></td>
            <td class="text-center align-middle">
                @if (auth()->user()->role == 'pelanggan')
                <a href="checkout/{{ $item->checkout_id }}/edit" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> <span class="btn-text">Edit</span></a>
                <form action="checkout/{{ $item->checkout_id }}" method="post" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan menghapus data ?')"><i class="fas fa-trash-alt"></i> <span class="btn-text">Delete</span></button>
                </form>
                 @endif
            </td>
        </tr>
        @endforeach
    </table>
    {{ $checkout->links() }}
@endsection