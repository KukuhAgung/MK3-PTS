<section id="buku" class="ftco-section ftco-no-pt bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          <span class="subheading">What we offer</span>
          <h2 class="mb-2">Most Popular</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="carousel-car owl-carousel">
            
            @foreach ($bukus as $buku)
                <div class="car-wrap ftco-animate pt-2">
                  <div class="flex mx-auto px-0 max-w-max">
                    <center>
                      <img class="border img-cover rounded" src="{{ asset('storage/'.$buku->cover) }}" width="60" height="100" alt="">
                    </center>
                  </div>
                    <div class="text">
                        <span class="carousel-penulis">{{ $buku->penulis }}</span>
                        <h6 class="mb-3 mt-1 carousel-judul" style="color: #000;><a href="#">{{ $buku->judul_buku }}</a></h6>
                        <div class="d-flex mb-3">
                            <p class="price">Rp{{ $formatted_price = number_format($buku->harga, 0, ',', '.') }}<span>/items</span></p>
                        </div>
                        <p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1">Buy</a> <a href="{{ route('buku.detail', $buku->id) }}" class="btn btn-secondary py-2 ml-1">Details</a></p>
                    </div>
                </div>
            @endforeach
        
            
          </div>
        </div>
      </div>
    </div>`
  </section>