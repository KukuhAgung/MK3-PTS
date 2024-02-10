<?php

use App\Http\Controllers\BerhitungController;
use App\Http\Controllers\TestController;
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

Route::get('/', function () {
    return view('welcome');
});


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

