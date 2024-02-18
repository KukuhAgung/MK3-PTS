<?php

use App\Http\Controllers\AdminController;
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

Route::get('/', [\App\Http\Controllers\UserController::class, 'index'])->name('userpage');

<<<<<<< HEAD
Route::get('admin/buku/{id}', [\App\Http\Controllers\BukuController::class, 'detail'])->name('buku.detail');
Route::get('admin/dashboard', [AdminController::class, 'index'])->name('adminpage');
Route::resource('admin/buku', \App\Http\Controllers\BukuController::class);
Route::put('admin/buku/update-image/{id}', [\App\Http\Controllers\BukuController::class, 'updateImage'])->name('buku.updateImage');
=======

Route::get('/daftar', function () {
    return view('daftar');
});

Route::get('/login', function () {
    return ('Ngantuk');
});


Route::get('/data/{id}', function ($id) {
    return 'user1' . $id;
});

Route::get('/hitung', [BerhitungController:: class, 'hitung']);

Route::get('/daftar', [TestController:: class, 'daftar']);
Route::post('/kirim', [TestController:: class, 'kirim']);

Route::get('/dashboard', [TestController:: class, 'index']);

>>>>>>> 11af2c29112b74d8cc0afe0b8ce871ee728bba11
