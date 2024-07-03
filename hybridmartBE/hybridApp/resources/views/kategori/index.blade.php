@extends('layouts.app')

@section('title','Data Kategori')

@section('content')

@if (session()->has('pesan'))
    <div class="alert alert-success mt-3" role="alert">
        {{ session('pesan') }}
    </div>
@endif
@if (auth()->user()->role == 'Manajer Stok' || auth()->user()->role == 'pegawai')
    
<a href="/kategori/create" class="btn btn-primary">  <i class="fas fa-fw fa-plus-circle"></i>
    Tambahkan Kategori </a>
@endif
    <table class="table table-bordered table-sm my-4">
        <tr>
            <th class="text-center align-middle">No</th>
            <th class="text-center align-middle">Nama Kategori</th>
            @if (auth()->user()->role == 'Manajer Stok' || auth()->user()->role == 'pegawai')
            <th class="text-center align-middle">Aksi</th>
            @endif
        </tr>
        @foreach ($kategoris as $item)
        <tr>
            <td class="text-center align-middle">{{ $loop->iteration }}</td>
            <td class="text-center align-middle">{{ $item->nama_kategori }}</td>
            @if (auth()->user()->role == 'Manajer Stok' || auth()->user()->role == 'pegawai')
    
            <td class="text-center align-middle">
                <a href="kategori/{{ $item->kategori_id }}/edit" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> <span class="btn-text">Edit</span></a>
                <form action="kategori/{{$item->kategori_id}}" method="post" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan menghapus data ?')"><i class="fas fa-trash-alt"></i> <span class="btn-text">Delete</span></button>
                </form>
            </td>
            @endif
        </tr>
        @endforeach
    </table>
    {{$kategoris->links()}}
@endsection