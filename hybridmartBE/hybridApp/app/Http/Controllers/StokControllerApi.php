<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use Illuminate\Http\Request;

class StokControllerApi extends Controller
{
    public function index()
    {
        $stok = Stok::all();
        return response()->json(['messege'=>'Success','data'=>$stok]);
    }

    public function store(Request $request)
    {
        return Stok::create($request->all());
        
    }

    public function show($id)
    {
        return Stok::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $Stok = Stok::findOrFail($id);
        $Stok->update($request->all());

        return $Stok;
    }

    public function destroy($id)
    {
        $Stok = Stok::findOrFail($id);
        $Stok->delete();

        return 204;
    }
}
