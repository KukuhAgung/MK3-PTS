<?php

namespace App\Http\Controllers;

use App\Models\buku;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $bukus = buku::orderBy('id')->get();
        return view('admin.buku.index')->with(compact('bukus'));
    }
}
