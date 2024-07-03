<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KeranjangsController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\OrderedProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('/', [DashboardController::class, 'index']);

    Route::resource('stok', StokController::class);
    Route::resource('user', UserController::class);
    Route::resource('keranjang', KeranjangsController::class);
    Route::resource('transaction', TransactionController::class);
    Route::resource('checkout', CheckoutController::class);
    Route::resource('kategori', KategoriController::class);

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});



Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'simpan')->name('register.simpan');
});
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);


