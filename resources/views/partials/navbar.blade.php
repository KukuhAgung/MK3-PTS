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
        @guest
        <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
        @else
        <form method="GET" action="{{ route('logout') }}" class="nav-link">
          @csrf
          <button type="submit" :href="route('logout')" class="btn btn-sm btn-danger"
            onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Log Out') }}</button>
        </form>
        @endguest
      </ul>
    </div>
  </div>
</nav>