	<section class="ftco-section bg-light">
		<div class="container">
			<div class="row">



                @foreach ($bukus as $buku)    
				<div class="col-md-4">
					<div class="car-wrap rounded ftco-animate">
                        <center>
                            <img class=" border img-display rounded d-flex align-items-end"
                                src="{{ asset('storage/'.$buku->cover) }}">
                            </img>
                        </center>
						<div class="text">
                            <span class="carousel-penulis">{{ $buku->penulis }}</span>
                            <h6 class="mb-3 mt-1 carousel-judul" style="color: #000;><a href="#">{{ $buku->judul_buku }}</a></h6>
                            <div class="d-flex mb-3">
                                <p class="price">Rp{{ $formatted_price = number_format($buku->harga, 0, ',', '.') }}<span>/items</span></p>
                            </div>
                            <p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1">Buy</a> <a href="{{ route('buku.detail', $buku->id) }}" class="btn btn-secondary py-2 ml-1">Details</a></p>
                        </div>
					</div>
				</div>
                @endforeach

				
</section>

</body>

</html>