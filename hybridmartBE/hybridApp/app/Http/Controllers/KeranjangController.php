<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Stok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('keranjang.index',['keranjangs'=>Keranjang::latest()->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('keranjang.create',['stok'=>Stok::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'stok_id' => 'required',
            'quantity' => 'required|integer',
        ]);
        $validatedData['user_id'] = Auth::id();

        Keranjang::create($validatedData);
        return redirect('/keranjang')->with('pesan', 'Data berhasil ditambahkan');
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
        return view('keranjang.edit', ['keranjangs'=>Keranjang::find($id)],['stoks'=>Stok::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'quantity' => 'required|integer'
        ]);

        Keranjang::where('keranjang_id', $id)->update(['quantity' => $validatedData['quantity']]);

        return redirect('/keranjang')->with('pesan', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $keranjang = Keranjang::find($id);
        $keranjang->delete();
        return redirect('/keranjang')->with('pesan', 'Data Berhasil di Hapus');
    }
}
