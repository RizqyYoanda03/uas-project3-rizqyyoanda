@extends('layouts.app')

@section('title', 'Tambah User')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/user">User</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah User </li>
    </ol>
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <p class="card-description m-0 font-weight-bold text-primary">Isi data :</p>

                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.store') }}" class="forms-sample"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputName1">Username</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="username"
                                placeholder="Masukkan Username" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Password</label>
                            <input type="password" class="form-control" id="exampleInputName1" name="password"
                                placeholder="Masukkan Password" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Email</label>
                            <input type="email" class="form-control" id="exampleInputName1" name="email"
                                placeholder="Masukkan Email" />
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputName1">Role</label>
                            <select class="form-control" name="role">
                                <option value="Manajer Stok">Manajer Stok</option>
                                <option value="Admin">Admin</option>
                                <option value="pegawai">Pegawai Toko</option>
                                <option value="pelanggan">Pelanggan</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                        <a href="{{ route('user.index') }}" class="btn btn-light">Cancel</a>
                </div>
            </div>
        </div>
    </div>
@endsection
