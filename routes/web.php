<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Models\Pembeli;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [UserController::class, 'index'])->name('userpage');
Route::get('login', function () {
    return view('auth.login');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('homepage');
    Route::get('/buku/{id}', [UserController::class, 'detail'])->name('buku.detail');
    Route::get('/buku/{id}/pembayaran', [UserController::class, 'buy'])->name('user.payment');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('transaksi', TransaksiController::class);
    Route::get('/dashboard/kasir/', [BukuController::class, 'kasir'])->name('dashboard.kasir');
    Route::resource('customers', PembeliController::class);
    Route::get('/dashboard/customer/', [PembeliController::class, 'customer'])->name('customers.customer');
    Route::resource('dashboard', BukuController::class);
    Route::get('/dashboard/buku/', [BukuController::class, 'show'])->name('dashboard.buku');
    Route::put('dashboard/admin/buku/update-image/{id}', [BukuController::class, 'updateImage'])->name('dashboard.updateImage');
});

require __DIR__ . '/auth.php';