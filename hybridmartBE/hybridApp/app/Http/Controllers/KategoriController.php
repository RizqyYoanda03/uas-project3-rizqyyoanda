<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kategori.index', ['kategoris' => Kategori::latest()->paginate(10)]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kategori' => 'required',
        ]);

        Kategori::create($validatedData);
        return redirect('/kategori')->with('pesan','Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('kategori.edit', ['kategoris' => Kategori::find($id)]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $validatedData = $request->validate([
        'nama_kategori' => 'required',
    ]);

    Kategori::where('kategori_id', $id)->update([
        'nama_kategori' => $validatedData['nama_kategori']
    ]);

    return redirect('/kategori')->with('pesan', 'Data berhasil dirubah');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kategori::destroy($id);
        return redirect('/kategori')->with('pesan', 'Data Berhasil di Hapus');
    }
}
