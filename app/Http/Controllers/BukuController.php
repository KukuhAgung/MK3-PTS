<?php

namespace App\Http\Controllers;

use App\Charts\PenjualanBuku;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BookStoreRequest;
use App\Http\Requests\Admin\BookUpdateRequest;
use App\Models\buku;
use App\Models\Transaksi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index(PenjualanBuku $chart)
    {
        return view('admin.penjualan.index', ['chart' => $chart->build()]);
    }

    public function create()
    {
        return view('admin.buku.create');

    }

    public function store(BookStoreRequest $request)
    {
        if ($request->validated()) {
            $cover = $request->file('cover')->store('buku', 'public');
            $slug = Str::slug($request->judul_buku, '-');
            buku::create($request->except('cover') + ['cover' => $cover, 'slug' => $slug]);
        }

        return redirect()->route('dashboard.show')->with([
            'message' => 'data sukses dibuat',
            'alert-type' => 'success'
        ]);
    }

    public function edit($id)
    {
        $buku = buku::findOrFail($id);
        return view('admin.buku.edit')->with(compact('buku'));
    }

    public function update(BookUpdateRequest $request, buku $buku)
    {
        if ($request->validated()) {
            $slug = Str::slug($request->judul_buku, '-');
            $buku->update($request->validated() + ['slug' => $slug]);
        }
        return redirect()->route('dashboard.show')->with([
            'message' => 'Data berhasil diubah',
            'alert-type' => 'success',
        ]);
    }

    public function updateImage(Request $request, $id)
    {
        $request->validate([
            'cover' => 'required|image|max:1024',
        ]);

        $buku = buku::findOrFail($id);

        if ($buku->cover) {
            unlink(public_path('storage/' . $buku->cover));
        }

        $cover = $request->file('cover')->store('buku', 'public');
        $buku->update(['cover' => $cover]);

        return redirect()->back()->with([
            'message' => 'Gambar berhasil diubah',
            'alert-type' => 'success',
        ]);
    }

    public function destroy($id)
    {
        $buku = buku::find($id);

        if (!$buku) {
            return redirect()->back()->with([
                'message' => 'Data tidak ditemukan',
                'alert-type' => 'warning'
            ]);
        }

        $buku->delete();

        return redirect()->back()->with([
            'message' => 'Data berhasil dihapus',
            'alert-type' => 'danger'
        ]);
    }
    public function kasir()
    {
        $transaksis = Transaksi::orderBy('created_at')->get();
        $bukus = [];

        foreach ($transaksis as $transaksi) {
            $id = $transaksi->id;
            $buku = buku::where('judul_buku', $transaksi->items)->first();

            if ($buku) {
                $bukus[] = [
                    'id' => $id,
                    'judul_buku' => $buku->judul_buku,
                    'cover' => $buku->cover,
                    'harga' => $buku->harga,
                    'pembeli' => $transaksi->pembeli,
                    'alamat' => $transaksi->alamat,
                    'total' => $transaksi->total,
                    'status' => $transaksi->status,
                ];
            }
        }
        return view('admin.kasir.index')->with(compact('bukus'));
    }
    public function show()
    {
        $bukus = buku::orderBy('id')->get();
        return view('admin.buku.index')->with(compact('bukus'));
    }
}
