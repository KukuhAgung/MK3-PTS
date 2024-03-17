@extends('layouts.admin')
@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="card">
    <div class="card-header">
        Form Tambah Buku
    </div>
    <div class="card-body">
        <form action="{{ route('dashboard.store') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="judul_buku">Judul Buku</label>
                <input type="text" name="judul_buku" class="form-control" value="{{ old('judul_buku') }}">
            </div>
            <div class="form-group">
                <label for="penulis">Penulis</label>
                <input type="text" name="penulis" class="form-control" value="{{ old('penulis') }}">
            </div>
            <div class="form-group">
                <label for="genre">Genre</label>
                <input type="text" name="genre" class="form-control" value="{{ old('genre') }}">
            </div>
            <div class="form-group">
                <label for="harga">Harga Buku</label>
                <input type="number" name="harga" class="form-control" value="{{ old('harga') }}">
            </div>
            <div class="form-group">
                <label for="sinopsis">Sinopsis</label>
                <textarea name="sinopsis" id="sinopsis" cols="50" rows="10"
                    class="form-control">{{ old('sinopsis')}}</textarea>
                @error('sinopsis')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="cover">Cover Buku</label>
                <input type="file" name="cover" class="form-control">
                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-dark">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection