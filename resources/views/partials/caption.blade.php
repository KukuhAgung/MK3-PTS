<div class="text justify-content-center active" style="margin-bottom: 1.5rem;">
    <h5 style="font-size : 1rem; p: 2px 2px; font-weight: 500;">>| Judul: {{ $buku->judul_buku }}</h5>
    <h5 style="font-size : 1rem; p: 2px 2px; font-weight: 500;">>| Penulis: {{ $buku->penulis }}</h5>
    <h5 style="font-size : 1rem; p: 2px 2px; font-weight: 500;">>| Harga: Rp{{ $formatted_price =
        number_format($buku->harga, 0, ',', '.') }}</h5>
    <h5 style="font-size : 1rem; p: 2px 2px; font-weight: 500;">>| Genre: {{ $buku->genre }}</h5>
    <p style="margin-top: 2rem;">Sinopsis</p>
    <span>{{ $buku->sinopsis }}</span>
</div>