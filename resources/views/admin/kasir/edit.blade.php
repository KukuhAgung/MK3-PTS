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
                Set Status Transaksi
            </div>
            <div class="card-body">
                <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="pembeli">Nama Pembeli</label>
                        <input type="text" name="pembeli" class="form-control"
                            value="{{ old('pembeli', $transaksi->pembeli) }}">
                    </div>
                    <div class="form-group">
                        <label for="items">Items</label>
                        <input type="text" name="items" class="form-control"
                            value="{{ old('items', $transaksi->items) }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" cols="40" rows="5"
                            class="form-control">{{ old('alamat', $transaksi->alamat)}}</textarea>
                        @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="total">Total Harga</label>
                        <input type="number" name="total" class="form-control"
                            value="{{ old('total', $transaksi->total) }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" name="status">
                            <option value="Success">Pending</option>
                            <option value="Success">Success</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Set Status</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection