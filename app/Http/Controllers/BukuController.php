<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BookStoreRequest;
use App\Http\Requests\Admin\BookUpdateRequest;
use App\Models\buku;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = buku::orderBy('id')->get();
        return view('admin.buku.index')->with(compact('bukus'));
    }
    public function create()
    {
        return view('admin.buku.create');
    }
    public function detail($id)
    {
        $buku = buku::findOrFail($id);
        return view('layouts.detail-buku')->with(compact('buku'));
    }

    public function store(BookStoreRequest $request)
    {
        if ($request->validated()) {
            $cover = $request->file('cover')->store('buku', 'public');
            $slug = Str::slug($request->judul_buku, '-');
            buku::create($request->except('cover') + ['cover' => $cover, 'slug' => $slug]);
        }

        return redirect()->route('buku.index')->with([
            'message' => 'data sukses dibuat',
            'alert-type' => 'success'
        ]);
    }

    public function edit(buku $buku)
    {
        return view('admin.buku.edit', compact('buku'));
    }

    public function update(BookUpdateRequest $request, buku $buku)
    {
        if ($request->validated()) {
            $slug = Str::slug($request->judul_buku, '-');
            $buku->update($request->validated() + ['slug' => $slug]);
        }
        return redirect()->route('buku.index')->with([
            'message' => 'Data berhasil diubah',
            'alert-type' => 'success',
        ]);
    }

    public function updateImage(Request $request, $bukuId)
    {
        $request->validate([
            'cover' => 'required|image|max:1024',
        ]);

        $buku = buku::findOrFail($bukuId);

        // Hapus gambar lama
        if ($buku->cover) {
            unlink(public_path('storage/' . $buku->cover));
        }

        // Simpan gambar baru
        $cover = $request->file('cover')->store('buku', 'public');
        $buku->update(['cover' => $cover]);

        return redirect()->back()->with([
            'message' => 'Gambar berhasil diubah',
            'alert-type' => 'success',
        ]);
    }

    public function destroy(buku $buku)
    {
        if ($buku->gambar) {
            unlink('storage/' . $buku->cover);
        }
        $buku->delete();

        return redirect()->back()->with([
            'message' => 'Data berhasil dihapus',
            'alert-type' => 'danger'
        ]);
    }
}
