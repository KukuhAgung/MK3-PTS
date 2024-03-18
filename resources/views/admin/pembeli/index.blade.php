@extends('layouts.admin')
@section('content')
<h1 class="h3 mb-2 text-gray-800">Daftar Customer</h1>
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
                        <th>Pengeluaran</th>
                        <th>Transaksi Awal</th>
                        <th>Transaksi Akhir</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($customers as $customer)
                    <tr>
                        <td class="flex items-center align-middle text-center">{{ $loop->iteration }}</td>
                        <td class="flex items-center align-middle text-center">{{ $customer->nama_pembeli }}</td>
                        <td class="flex items-center align-middle text-center">{{ $customer->alamat }}</td>
                        <td class="flex items-center align-middle text-center">{{ $customer->pengeluaran }}</td>
                        <td class="flex items-center align-middle text-center">{{ $customer->created_at }}</td>
                        <td class="flex items-center align-middle text-center">{{ $customer->updated_at }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">Belum Ada Customer !</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection