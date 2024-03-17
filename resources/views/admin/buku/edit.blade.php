@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-8">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session('message'))
                <div class="alert alert-{{ session('alert-type') }}">
                    {{ session('message') }}
                </div>
            @endif

                <div class="card">
                    <div class="card-header">
                        Form Edit Buku
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dashboard.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="judul_buku">Judul Buku</label>
                                <input type="text" name="judul_buku" class="form-control" value="{{ old('judul_buku', $buku->judul_buku) }}">
                            </div>
                            <div class="form-group">
                                <label for="penulis">Penulis</label>
                                <input type="text" name="penulis" class="form-control" value="{{ old('penulis', $buku->penulis) }}">
                            </div>
                            <div class="form-group">
                                <label for="genre">Genre</label>
                                <input type="text" name="genre" class="form-control" value="{{ old('genre', $buku->genre) }}">
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga Buku</label>
                                <input type="number" name="harga" class="form-control" value="{{ old('harga', $buku->harga) }}">
                            </div>
                            <div class="form-group">
                                <label for="sinopsis">Sinopsis</label>
                                <textarea  name="sinopsis" id="sinopsis" cols="50" rows="10" class="form-control" >{{ old('sinopsis', $buku->sinopsis) }}</textarea>
                                @error('sinopsis')
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
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header">
                        Cover Buku
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dashboard.updateImage', $buku->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <img src="{{ asset('storage/'.$buku->cover) }}" width="120" height="200" alt="">
                            </div>
                            <div class="form-group">
                                <input type="file" name="cover" id="cover" class="form-control">
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
            </div>
        </div>
    </div>
@endsection