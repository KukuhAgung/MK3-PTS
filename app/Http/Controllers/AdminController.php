<?php

namespace App\Http\Controllers;

use App\Models\buku;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $bukus = buku::orderBy('terjual')->get();
        return view('layouts.admin-penjualan')->with(compact('bukus'));
    }
}
