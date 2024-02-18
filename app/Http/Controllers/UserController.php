<?php

namespace App\Http\Controllers;
use App\Models\buku;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $bukus = buku::all();
        return view('homepage')->with(compact('bukus'));
    }
}
