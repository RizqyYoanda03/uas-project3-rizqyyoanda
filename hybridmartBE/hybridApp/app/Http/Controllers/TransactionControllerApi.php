<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionControllerApi extends Controller
{
    public function index()
    {
        return Transaction::all();
    }

    public function store(Request $request)
    {
        return Transaction::create($request->all());
    }

    public function show($id)
    {
        return Transaction::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $Transaction = Transaction::findOrFail($id);
        $Transaction->update($request->all());

        return $Transaction;
    }

    public function destroy($id)
    {
        $Transaction = Transaction::findOrFail($id);
        $Transaction->delete();

        return 204;
    }
}
