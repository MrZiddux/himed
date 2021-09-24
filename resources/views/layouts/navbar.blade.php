<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
  <div class="container">
    <a class="navbar-brand" href="/">
      <img src="/images/himed_logo.png" alt="himed logo" height="24">
    </a>
    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ms-auto">
        @foreach($navbar as $item => $url)
        <a class="nav-link {{ request()->is($url) ? 't-color-primary' : '' }} hover-text-primary" href="{{ $url }}">{{ $item }}</a>
        @endforeach
      </div>
    </div>
  </div>
</nav>