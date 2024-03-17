<?php

namespace App\Http\Controllers;

use App\Http\Requests\Transaksi\StoreTransaksiRequest;
use App\Http\Requests\Transaksi\UpdateTransaksiRequest;
use App\Models\Transaksi;
use App\Models\buku;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = buku::all();
        return view('homepage')->with(compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.payment');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransaksiRequest $request, buku $buku)
    {
        if ($request->input('pembeli') == null) {
            return redirect()->back()->with([
                'message' => 'Pembeli harus diisi',
                'alert-type' => 'error'
            ]);
        }

        $transaksi = new Transaksi();
        $transaksi->pembeli = $request->input('pembeli');
        $transaksi->items = $request->input('items');
        $transaksi->alamat = $request->input('alamat');
        $transaksi->total = $request->input('total');
        $transaksi->save();

        $transaksi->save();

        return redirect()->back()->with([
            'message' => 'Transaksi berhasil ditambahkan',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('admin.kasir.edit')->with(compact('transaksi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransaksiRequest $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);
    
        if ($request->validated()) {
            $transaksi->pembeli = $request->input('pembeli');
            $transaksi->items = $request->input('items');
            $transaksi->alamat = $request->input('alamat');
            $transaksi->total = $request->input('total');
    
            if ($request->input('status') === 'Success') {
                $transaksi->status = 'Success';
                $buku = buku::where('judul_buku', $transaksi->items)->first();
                $buku->increment('terjual');
            }
    
            $transaksi->save();
        }
    
        return redirect()->back()->with([
            'message' => 'Status transaksi berhasil diubah',
            'alert-type' => 'success',
        ]);
    }
    



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->back()->with([
            'message' => 'Transaksi berhasil dihapus',
            'alert-type' => 'danger'
        ]);
    }
}
