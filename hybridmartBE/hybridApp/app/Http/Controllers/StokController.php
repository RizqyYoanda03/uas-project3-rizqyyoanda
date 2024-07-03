<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Stok;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StokController extends Controller
{ 

    public function index()
    {
        $stok = Stok::latest()->paginate(10);
        $kategori = Kategori::all();
        return view('stok.index', compact('stok','kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stok.create',['kategoris'=>Kategori::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'kode_barang' => 'required',
            'product_name' => 'required',
            'kategori_id' => 'required',
            'product_price' => 'required|numeric',
            'gambar' => 'required',
            'quantity' => 'required|integer',
        ]);

        if ($request->hasFile('gambar')) {
            $namaFile = 'img_' . time() . '_' . $request->gambar->getClientOriginalName();
            $request->gambar->move('img', $namaFile);
        } else {
            $namaFile = 'img_default.png';
        }
        $validatedData['gambar'] = $namaFile;

        // Simpan data stok
        Stok::create([
            'kode_barang' => $validatedData['kode_barang'],
            'product_name' => $validatedData['product_name'],
            'kategori_id' => $validatedData['kategori_id'],
            'product_price' => $validatedData['product_price'],
            'gambar' => $validatedData['gambar'],
            'quantity' => $validatedData['quantity'],
        ]);


        return redirect('/stok')->with('pesan', 'Data berhasil ditambahkan');
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
        $stok = Stok::find($id);
        $kategoris = Kategori::all();
        return view('stok.edit', compact('stok','kategoris'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $stok = Stok::find($id);

        // Validasi data
        $validatedData = $request->validate([
            'kode_barang' => 'required',
            'product_name' => 'required',
            'kategori_id' => 'required',
            'product_price' => 'required|numeric',
            'gambar' => 'nullable',
            'quantity' => 'required|integer',
        ]);

        if ($request->hasFile('gambar')) {
            $foto = $request->file('gambar');
            $namaFile = 'img' . time() . '_' . $foto->getClientOriginalName();
            $foto->move('img', $namaFile);

            // Jika ada file yang diunggah, update nama file gambar
            $validatedData['gambar'] = $namaFile;
        } else {
            // Jika tidak ada file gambar yang diunggah, gunakan gambar yang sudah ada
            $validatedData['gambar'] = $stok->gambar;
        }
        
        $stok->update($validatedData);

        return redirect('/stok')->with('success', 'stok berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Stok::destroy($id);
        return redirect('/stok')->with('pesan', 'Data Berhasil di Hapus');
    }
}
