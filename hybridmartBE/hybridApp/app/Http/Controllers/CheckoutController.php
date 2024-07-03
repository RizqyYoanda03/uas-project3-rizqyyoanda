<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use App\Models\Checkout;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {
        $checkout = Checkout::latest()->paginate(10);
        $stok = Stok::all();

        $totalPrice = $stok->reduce(function ($carry, $stok) {
            return $carry + ($stok->price * $stok->quantity);
        }, 0);
        return view('checkout.index', compact('stok', 'checkout'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('checkout.create', ['stoks' => Stok::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'stok_id' => 'required', // Memastikan stok_id yang dipilih ada di tabel stoks
            'quantity' => 'required|integer|min:1', // Validasi quantity
        ]);

        // Ambil stok dari database
        $stok = Stok::findOrFail($validatedData['stok_id']);

        // Pastikan jumlah quantity yang dimasukkan tidak melebihi jumlah stok yang tersedia
        if ($validatedData['quantity'] > $stok->quantity) {
            return redirect()->back()->withInput()->withErrors(['quantity' => 'Jumlah yang dimasukkan melebihi stok yang tersedia']);
        }

        // Kurangi quantity stok
        $stok->quantity -= $validatedData['quantity'];
        $stok->save();

        // Simpan data checkout
        Checkout::create([
            'stok_id' => $validatedData['stok_id'],
            'quantity' => $validatedData['quantity'],
        ]);

        return redirect('/checkout')->with('pesan', 'Data berhasil disimpan');
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
    //     $checkout = Checkout::findOrFail($id);
    //     $stoks = Stok::all(); // Anda perlu mengganti ini sesuai dengan cara Anda mengambil data stok
    //     return view('checkout.edit', compact('checkout', 'stoks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $checkout = Checkout::findOrFail($id);

        // // Simpan quantity checkout sebelum diubah
        // $oldQuantity = $checkout->quantity;

        // // Validasi data yang diperbarui
        // $validatedData = $request->validate([
        //     'quantity' => 'required|integer|min:1',
        // ]);

        // // Perbarui data checkout
        // $checkout->update($validatedData);

        // // Periksa perubahan dalam quantity checkout
        // $newQuantity = $request->quantity;
        // $quantityDifference = $newQuantity - $oldQuantity;

        // // Perbarui quantity di tabel stok jika terjadi perubahan
        // if ($quantityDifference != 0) {
        //     $stok = Stok::findOrFail($checkout->stok_id);
        //     $stok->quantity -= $quantityDifference;
        //     $stok->save();
        // }

        // return redirect('/checkout')->with('pesan', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $checkout = Checkout::findOrFail($id);

    // Simpan quantity checkout sebelum dihapus
    $quantity = $checkout->quantity;

    // Hapus data checkout
    $checkout->delete();

    // Tambahkan kembali quantity ke tabel stok
    $stok = Stok::findOrFail($checkout->stok_id);
    $stok->quantity += $quantity;
    $stok->save();

    return redirect('/checkout')->with('pesan', 'Checkout Barang Dibatalkan');
    }
}
