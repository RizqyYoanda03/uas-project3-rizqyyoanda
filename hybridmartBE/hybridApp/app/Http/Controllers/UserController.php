<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil jumlah pengguna dari database
        $jumlahUser = User::count();

        // Ambil daftar pengguna dengan paginasi
        $users = User::latest()->paginate(10);

        return view('user.index', [
            'users' => $users,
            'jumlahUser' => $jumlahUser
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'role' => 'required'
        ]);

        User::create($validatedData);
        return redirect('/user')->with('pesan', 'Data berhasil disimpan');
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect('/user')->with('pesan', 'Data Berhasil di Hapus');
    }
}
