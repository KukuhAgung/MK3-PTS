<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;

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


Route::get('admin/buku/{id}', [BukuController::class, 'detail'])->name('buku.detail');
Route::get('admin/create', [BukuController::class, 'create'])->name('buku.create');
Route::get('admin/dashboard', [AdminController::class, 'index'])->name('adminpage');
Route::resource('admin/buku', BukuController::class);

Route::put('admin/buku/update-image/{id}', [BukuController::class, 'updateImage'])->name('buku.updateImage');
