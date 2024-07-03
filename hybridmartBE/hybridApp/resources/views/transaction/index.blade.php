@extends('layouts.app')

@section('title','Data Transaksi')

@section('content')

@if (session()->has('pesan'))
    <div class="alert alert-success mt-3" role="alert">
        {{ session('pesan') }}
    </div>
@endif
    <table class="table table-bordered table-sm my-4">
        <tr>
            <th class="text-center align-middle">No</th>
            <th class="text-center align-middle">Nama</th>
            <th class="text-center align-middle">Tanggal Transaksi</th>
            <th class="text-center align-middle">Total Harga</th>
            <th class="text-center align-middle">Aksi</th>
        </tr>
        @foreach ($transactions as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td class="text-center align-middle">{{ $item->user->username }}</td>
            <td class="text-center align-middle">{{ $item->tanggal_transaksi }}</td>
            <td class="text-center align-middle">{{ $item->total_harga }}</td>
            <td class="text-center align-middle">
                <a href="transaction/{{ $item->transaction_id }}/edit" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> <span class="btn-text">Edit</span></a>
                <form action="transaction/{{ $item->transaction_id }}" method="post" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan menghapus data ?')"><i class="fas fa-trash-alt"></i> <span class="btn-text">Delete</span></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{ $transactions->links() }}
@endsection