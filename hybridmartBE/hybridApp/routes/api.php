<?php

use App\Http\Controllers\CheckoutControllerApi;
use App\Http\Controllers\KategoriControllerApi;
use App\Http\Controllers\StokControllerApi;
use App\Http\Controllers\TransactionControllerApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::resource('checkoutApi', CheckoutControllerApi::class);
Route::resource('stokApi', StokControllerApi::class);
Route::resource('transactionApi', TransactionControllerApi::class);
Route::resource('kategoriApi', KategoriControllerApi::class);

