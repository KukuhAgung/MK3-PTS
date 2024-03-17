@extends('layouts.admin')
@section('content')
<h1 class="h3 mb-2 text-gray-800">Transaksi</h1>
<p class="mb-4">Chart.js is a third party plugin that is used to generate the charts in this theme.
    The charts below have been customized - for further customization options, please visit the <a target="_blank"
        href="https://www.chartjs.org/docs/latest/">official Chart.js
        documentation</a>.</p>
@if(session('message'))
<div class="alert alert-{{ session('alert-type') }}">
    {{ session('message') }}
</div>
@endif
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Kasir</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Pembeli</th>
                        <th>Alamat</th>
                        <th>Item</th>
                        <th>Judul</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($bukus as $item)
                    <tr>
                        <td class="flex items-center align-middle text-center">{{ $loop->iteration }}</td>
                        <td class="flex items-center align-middle text-center">{{ $item['pembeli'] }}</td>
                        <td class="flex items-center align-middle text-center">{{ $item['alamat'] }}</td>
                        <td class="flex items-center align-middle text-center">
                            <img src="{{ asset('storage/'.$item['cover']) }}" width="60" height="100">
                        </td>
                        <td class="flex items-center align-middle text-center">{{ $item['judul_buku'] }}</td>
                        <td class="flex items-center align-middle text-center">{{ $item['total'] }}</td>
                        <td class="flex items-center align-middle text-center">
                            @if($item['status'] == 'Success')
                            <h6 class="btn btn-sm btn-success" style="pointer-events:none;">{{ $item['status'] }}</h6>
                            @else
                            <h6 class="btn btn-sm btn-warning">{{ $item['status'] }}</h6>
                            @endif
                        </td>
                        <td class="flex text-center items-center align-middle">
                            @if($item['status'] == 'Success')
                            <form action="{{ route('transaksi.destroy', $item['id']) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                            @else
                            <form action="">
                                <a href="{{ route('transaksi.edit', $item['id']) }}"
                                    class="btn btn-sm btn-success mb-1 px-3">Konfirmasi</a>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">Tidak Ada Transaksi !</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection