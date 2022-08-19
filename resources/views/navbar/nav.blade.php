<nav class="navbar navbar-expand bg-dark">
    <div class="container">
      <a class="navbar-brand text-muted {{ Request::is('/') ? 'active' : '' }}" href="/">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('/') ? 'text-light' : 'text-muted' }}" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('about') ? 'text-light' : 'text-muted' }}" href="/about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('products') ? 'text-light' : 'text-muted' }}" href="/products">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('categories') ? 'text-light' : 'text-muted' }}" href="/categories">Categories</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          @auth
          <li class="nav-item mt-2 text-light">
            <h6>{{ auth()->user()->name }}</h6>
          </li>
          <li class="nav-item mx-3">
            <form action="/logout" method="POST">
              @csrf
              <button class="btn btn-dark"><i class="bi bi-box-arrow-right"></i> Logout</button>
            </form>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link" href="/login"><i class="bi bi-box-arrow-in-right mx-2"></i>Login</a>
          </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>