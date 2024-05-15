<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\User;

use function Laravel\Prompts\alert;

class UserController extends Controller
{
    public function index()
    {
        $role = User::get('role');
        alert($role);
        $buku = buku::all();
        if ($role == 'admin') {
            return redirect('/dashboard');
        } else {
            return view('homepage')->with(compact('buku'));
        }
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
