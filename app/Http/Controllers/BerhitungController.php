<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerhitungController extends Controller
{
    public function hitung(){
        $bill1 = 10;
        $bill2 = 5;
        $hasil = $bill1 - $bill2;
        return view('hasil', ['hasiljumlah' => $hasil]);
    }
}
