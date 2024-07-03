<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;

class CheckoutControllerApi extends Controller
{
    public function index()
    {
        return Checkout::all();
    }

    public function store(Request $request)
    {
        return Checkout::create($request->all());
    }

    public function show($id)
    {
        return Checkout::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $Checkout = Checkout::findOrFail($id);
        $Checkout->update($request->all());

        return $Checkout;
    }

    public function destroy($id)
    {
        $Checkout = Checkout::findOrFail($id);
        $Checkout->delete();

        return 204;
    }
}
