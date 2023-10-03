<link rel="stylesheet" href=" {{ asset('css/part/navbar.css')}}">

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
          @if(Auth::check() != NULL && Auth::user()->level == 'user')
          <li class="nav-item">
            <a class="nav-link fw-bold active" aria-current="page" href="/jurnal">Jurnal</a>
          </li>
          @endif
          <li class="nav-item">
            <a class="nav-link fw-bold active" aria-current="page" href="/organisasi">Organisasi</a>
          </li>
          <li class="nav-item button d-flex align-items-center gap-2">
            <hr class="d-lg-block d-none">
            @if(Auth::check() == NULL)
            <li class="nav-item">
            <a class="nav-link fw-bold active" aria-current="page" href="/login">Login</a>
          </li>
            @elseif(Auth()->user()->level == 'user')
            <div class="dropdown">
              <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-user"></i>
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/myevent">My Event</a></li>
                <li><a class="dropdown-item" href="/logout">Logout</a></li>
              </ul>
            </div>
            @elseif(Auth()->user()->level == 'admin')
              <li class="nav-item">
            <a class="nav-link fw-bold active" aria-current="page" href="/login">Login</a>
          </li>
            @elseif(Auth()->user()->level == 'cabang')
              <li class="nav-item">
            <a class="nav-link fw-bold active" aria-current="page" href="/login">Login</a>
          </li>
            @endif
          </li>
        </ul>
      </div>
    </div>
</nav>

<!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad id nihil, aut dignissimos consequuntur placeat voluptates minus vero totam iusto animi odit in eum temporibus quasi quia similique ab debitis sapiente? Unde, est debitis enim corrupti eius impedit omnis ipsa laudantium soluta praesentium officiis perferendis. Iusto accusamus molestiae, dicta quibusdam beatae aspernatur minima a eius eum provident velit, nam unde reiciendis ipsum ut mollitia dolor tenetur error expedita. Natus maxime ab asperiores quidem aut iste, cum quaerat, reprehenderit commodi eius dolorum voluptatem tenetur at impedit, harum suscipit recusandae! Beatae recusandae totam incidunt fuga blanditiis ratione ducimus atque eius iure deserunt. -->