@extends('layouts.app')

@section('title','Data User')

@section('content')

@if (session()->has('pesan'))
    <div class="alert alert-success mt-3" role="alert">
        {{ session('pesan') }}
    </div>
@endif
<a href="/user/create" class="btn btn-primary" style="margin-bottom: 20px;">  <i class="fas fa-fw fa-plus-circle" ></i>
    Tambahkan User </a>
    <div style="margin-bottom: 20px;">Jumlah Pengguna: {{ $jumlahUser }}</div>
    <table class="table table-bordered table-sm my-4">
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
        @foreach ($users as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->username }}</td>
            <td>{{ $item->email}}</td>
            <td>{{ $item->role}}</td>
            </td>
            <td>
                <form action="user/{{$item->user_id}}" method="post" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan menghapus data ?')"><i class="fas fa-trash-alt"></i> <span class="btn-text">Delete</span></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{$users->links()}}
@endsection