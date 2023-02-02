<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3 px-5">
  <div class="container">
    <a class="navbar-brand" href="/">Hospital</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('polyclinic*') ? 'active' : '' }}" href="/polyclinic">Poliklinik</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('doctor*') ? 'active' : '' }}" href="/doctor">Dokter</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('patient*') ? 'active' : '' }}" href="/patient">Pasien</a>
        </li>
      </ul>
    </div>
  </div>
</nav>