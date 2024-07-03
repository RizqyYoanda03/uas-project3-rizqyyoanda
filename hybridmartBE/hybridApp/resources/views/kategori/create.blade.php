@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/kategori">Kategori</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Kategori </li>
    </ol>
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <p class="card-description m-0 font-weight-bold text-primary">Isi data :</p>

                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('kategori.store') }}" class="forms-sample"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama_kategori">Nama Kategori</label>
                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori"
                                placeholder="Masukkan Nama Kategori" />
                        </div>

                        <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                        <a href="{{ route('kategori.index') }}" class="btn btn-light">Cancel</a>
                </div>
            </div>
        </div>
    </div>
@endsection
