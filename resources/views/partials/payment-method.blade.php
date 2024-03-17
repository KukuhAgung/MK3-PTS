@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="active">
    <form action="{{ route('transaksi.store') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="pembeli">Nama Pembeli</label>
            <input type="text" name="pembeli" class="form-control" value="{{ old('pembeli') }}">
        </div>
        <div class="form-group">
            <label for="items">Items</label>
            <input type="text" name="items" class="form-control" value="{{ $buku->judul_buku }}" readonly>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" cols="40" rows="5" class="form-control">{{ old('alamat')}}</textarea>
            @error('alamat')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="total">Total Harga</label>
            <input type="number" name="total" class="form-control" value="{{ $buku->harga }}" readonly>
        </div>
        <div class="form-group d-flex align-items-center gap-3">
            <div class="form-group">
                <input type="radio" name="pembayaran" value="COD">
                <img src="{{ asset('images/COD.png') }}" alt="" width="90">
                </input>
            </div>
            <div class="form-group">
                <input type="radio" name="pembayaran" value="Visa Mastercard">
                <img src="{{ asset('images/VISA.png') }}" alt="" width="90">
                </input>
            </div>
            <div class="form-group">
                <input type="radio" name="pembayaran" value="Gopay">
                <img src="{{ asset('images/Gopay.png') }}" alt="" width="90">
                </input>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Buy Now</button>
        </div>
    </form>
</div>