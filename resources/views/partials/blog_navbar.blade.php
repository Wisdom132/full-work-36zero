 <nav class="navbar navbar-expand-lg navbar-light bg-dark sticky-top">
  <div class="container">
    <a class="navbar-brand" href="/">
      <img src="{{ asset('images/logo1.png') }}" width="120px" height="35px" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link text-light pr-4" href="/home">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light pr-4" href="{{ route('footprint') }}">Footprint</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light pr-4" href="/musing">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light pr-4" href="/contact">Contact us</a>
        </li>
      </ul>
    </div>
  </nav>

{{-- <nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="index.html">
      <img src="{{ asset('images/logo1.png') }}" width="120px" height="35px" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link text-light pr-5" href="/home">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light pr-4" href="/footprint">Footprint</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light pr-4" href="/musing">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light pr-4" href="/contact">Contact us</a>
        </li>
      </ul>
    </div>
  </nav> --}}
