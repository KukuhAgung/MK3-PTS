<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
  <div class="container">
    <a class="navbar-brand" href="{{ route('userpage') }}">BOOK<span>GEDEBUK</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="oi oi-menu"></span> Menu
    </button>

    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active"><a href="{{ route('userpage') }}" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="#buku" class="nav-link">Buku</a></li>
        @if(Auth::check())
        <li class="nav-item"><a href="{{ url('/dashboard') }}" class="nav-link">Admin</a></li>
        @else
        <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
        @endif
      </ul>
    </div>
  </div>
</nav>