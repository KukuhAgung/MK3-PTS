<?php

namespace App\Http\Controllers;

use App\Models\buku;

class UserController extends Controller
{
    public function index()
    {
        $buku = buku::all();
        return view('homepage')->with(compact('buku'));
    }
    public function detail($id)
    {
        $buku = buku::findOrFail($id);
        return view('layouts.detail-buku')->with(compact('buku'));
    }
    public function buy($id)
    {
        $buku = buku::findOrFail($id);
        return view('layouts.payment')->with(compact('buku'));
    }
}
