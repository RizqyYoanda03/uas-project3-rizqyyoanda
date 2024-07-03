<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriControllerApi extends Controller
{
    public function index()
    {
        return Kategori::all();
    }

    public function store(Request $request)
    {
        return Kategori::create($request->all());
    }

    public function show($id)
    {
        return Kategori::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $Kategori = Kategori::findOrFail($id);
        $Kategori->update($request->all());

        return $Kategori;
    }

    public function destroy($id)
    {
        $Kategori = Kategori::findOrFail($id);
        $Kategori->delete();

        return 204;
    }
}
