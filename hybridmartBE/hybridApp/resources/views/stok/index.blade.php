@extends('layouts.app')

@section('title', 'Data Stok')

@section('content')

    @if (session()->has('pesan'))
        <div class="alert alert-success mt-3" role="alert">
            {{ session('pesan') }}
        </div>
    @endif
    @if (auth()->user()->role == 'Manajer Stok' || auth()->user()->role == 'pegawai')
        <a href="/stok/create" class="btn btn-primary"> <i class="fas fa-fw fa-plus-circle"></i>
            Tambahkan Produk </a>
    @endif
    <table class="table table-bordered table-sm my-4">
        <tr>
            <th class="text-center align-middle">No</th>
            <th class="text-center align-middle">Kode Barang</th>
            <th class="text-center align-middle">Nama Barang</th>
            <th class="text-center align-middle">Kategori</th>
            <th class="text-center align-middle">Harga</th>
            <th class="text-center align-middle">Gambar</th>
            <th class="text-center align-middle">Jumlah</th>
            @if (auth()->user()->role == 'Manajer Stok')
                <th class="text-center align-middle">Aksi</th>
            @endif
        </tr>
        @foreach ($stok as $item)
            <tr>
                <td class="text-center align-middle">{{ $loop->iteration }}</td>
                <td class="text-center align-middle">{{ $item->kode_barang }}</td>
                <td class="text-center align-middle">{{ $item->product_name }}</td>
                <td class="text-center align-middle">{{ $item->kategori->nama_kategori }}</td>
                <td class="text-center align-middle">{{ $item->product_price }}</td>
                <td class="text-center align-middle"><img src="{{ asset('img/' . $item->gambar) }}"
                        alt="{{ $item->product_name }}" style="width: 95px; height: 120px"></td>
                <td class="text-center align-middle">{{ $item->quantity }}</td>
            @if (auth()->user()->role == 'Manajer Stok')
                <td class="text-center align-middle">
                    <a href="stok/{{ $item->stok_id }}/edit" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i>
                        <span class="btn-text">Edit</span></a>
                    <form action="stok/{{ $item->stok_id }}" method="post" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin akan menghapus data ?')"><i class="fas fa-trash-alt"></i> <span
                                class="btn-text">Delete</span></button>
                    </form>
                </td>
            @endif
            </tr>
        @endforeach
    </table>
    {{ $stok->links() }}
@endsection
