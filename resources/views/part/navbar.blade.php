<link rel="stylesheet" href=" {{ asset('../css/part/navbar.css')}}">

<nav class="navbar navbar-expand-lg bg-light py-2">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center justify-content-between justify-content-lg-start gap-3" href="#">
        <img src="{{asset('../image/pdfi-logo.png')}}" alt="">
        <p class="cust-nav-p fw-bold">PERSATUAN DOKTER <br class="d-block d-sm-none"> FORENSIK INDONESIA</p>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto gap-3">
          <li class="nav-item">
            <a class="nav-link fw-bold active" aria-current="page" href="/">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-bold active" aria-current="page" href="/update">Update</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-bold active" aria-current="page" href="/agenda">Agenda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-bold active" aria-current="page" href="/organisasi">Organisasi</a>
          </li>
          <li class="nav-item button d-flex align-items-center gap-2">
            <hr class="d-lg-block d-none">
            @if(Auth::check() == NULL)
              <a class="btn btn-dark px-3 py-1" href="/register" role="button "><p class="md">Register</p></a>
              <a class="btn btn-primary px-3 py-1" href="/login" role="button "><p class="md">Login</p></a>
            @elseif(Auth()->user()->level == 'user')
            <a class="btn btn-danger" href="/logout">Logout</a> 
            @elseif(Auth()->user()->level == 'admin')
            <a class="btn btn-dark px-3 py-1" href="/register" role="button "><p class="md">Register</p></a>
              <a class="btn btn-primary px-3 py-1" href="/login" role="button "><p class="md">Login</p></a>
            @elseif(Auth()->user()->level == 'cabang')
            <a class="btn btn-dark px-3 py-1" href="/register" role="button "><p class="md">Register</p></a>
              <a class="btn btn-primary px-3 py-1" href="/login" role="button "><p class="md">Login</p></a>
            @endif
          </li>
        </ul>
      </div>
    </div>
</nav>