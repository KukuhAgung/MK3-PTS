@extends('layouts.admin')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data</h1>
    <a href="{{ route('dashboard.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-dark shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Tambah Data</a>
</div>
@if(session('message'))
<div class="alert alert-{{ session('alert-type') }}">
    {{ session('message') }}
</div>
@endif
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Data Stok</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Harga</th>
                        <th>Sinopsis</th>
                        <th>Cover</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($bukus))
                    @foreach ($bukus as $buku)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $buku->judul_buku }}</td>
                        <td>{{ $buku->penulis }}</td>
                        <td>{{ $buku->harga }}</td>
                        <td>{{ $buku->sinopsis }}</td>
                        <td>
                            <img src="{{ asset('storage/'.$buku->cover) }}" width="60" height="100">
                        </td>
                        <td class="flex justify-between text-center items-center align-middle">
                            <a href="{{ route('dashboard.edit', $buku->id) }}"
                                class="btn btn-sm btn-warning mb-1 px-3">Edit</a>
                            <form action="{{ route('dashboard.destroy', $buku->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-dark">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="8" class="text-center">Data Kosong !</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection