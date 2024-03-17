@extends('layouts.admin-cart')
@section('content')
<h1 class="h3 mb-2 text-gray-800">Grafik Penjualan</h1>
<p class="mb-4">Chart.js is a third party plugin that is used to generate the charts in this theme.
    The charts below have been customized - for further customization options, please visit the <a target="_blank"
        href="https://www.chartjs.org/docs/latest/">official Chart.js
        documentation</a>.</p>



<div class="col-xl-auto col-lg-auto">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Bar Chart</h6>
        </div>
        <div class="card-body">
            {!! $chart->container() !!}
        </div>
    </div>
</div>

@endsection