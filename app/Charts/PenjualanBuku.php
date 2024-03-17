<?php

namespace App\Charts;

use App\Models\Transaksi;
use App\Models\buku;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class PenjualanBuku
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {

        $bukus = buku::pluck('judul_buku')->toArray();
        $count = count($bukus);

        $datapenjualan = [];
        $datapendapatan = [];


        for ($i = 0; $i < $count; $i++) {
            $harga = buku::where('terjual', '>', 0)
                ->where('judul_buku', $bukus[$i])
                ->sum('harga');

            $penjualan = buku::where('terjual', '>', 0)
                ->where('judul_buku', $bukus[$i])
                ->sum('terjual');

            $pendapatan = $penjualan * $harga;


            $judul[] = $bukus[$i];
            $datapenjualan[] = $penjualan;
            $datapendapatan[] = $pendapatan;
        }

        return $this->chart->barChart()
            ->setTitle('Jumlah Buku Terjual dan Pendapatan')
            ->setSubtitle('Berdasarkan ' . $penjualan . ' terakhir')
            ->addData('Penjualan', $datapenjualan)
            ->addData('Pendapatan', $datapendapatan)
            ->setHeight(400)
            ->setColors(['#19181B'])
            ->setXAxis($judul);
    }

}
