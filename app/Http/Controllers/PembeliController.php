<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use App\Http\Controllers\TransaksiController;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class PembeliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Pembeli::all();
        return view('admin.pembeli.index')->with(compact('customers'));
    }
}
