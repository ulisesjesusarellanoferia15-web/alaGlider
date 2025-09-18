<nav class="layout-navbar navbar navbar-expand-xl align-items-center" id="layout-navbar">
  <div class="container-xxl">

    <!-- Navbar -->
          <nav class="layout-navbar navbar navbar-expand-xl align-items-center" id="layout-navbar">
            <div class="container-xxl">
              <!-- Logo -->
              <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-4 ms-0">
                <a href="{{ url('/') }}" class="app-brand-link">
                  <span class="app-brand-logo demo">
                    <span class="text-primary">
                      <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" width="150rem" />
                    </span>
                  </span>
                </a>

                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-xl-none">
                  <i class="icon-base ti tabler-x icon-sm d-flex align-items-center justify-content-center"></i>
                </a>
              </div>

              <!-- Responsive Toggle -->
              <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
                  <i class="icon-base ti tabler-menu-2 icon-md"></i>
                </a>
              </div>

              <div class="navbar-nav-right d-flex align-items-center justify-content-end" id="navbar-collapse">
                <ul class="navbar-nav flex-row align-items-center ms-md-auto">

                  {{-- ============================
                      SI NO HAY USUARIO AUTENTICADO
                  ============================= --}}
                  @guest
                    <!-- Moneda -->
                    <li class="nav-item dropdown me-3">
                      <a class="nav-link dropdown-toggle btn btn-outline-secondary rounded-pill px-3" href="#" data-bs-toggle="dropdown">
                        $ Moneda
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">USD</a></li>
                        <li><a class="dropdown-item" href="#">MXN</a></li>
                        <li><a class="dropdown-item" href="#">COL</a></li>
                      </ul>
                    </li>

                    <!-- Conviertete en Glider -->
                    <li class="nav-item me-2">
                      <a href="{{ route('login') }}" class="btn btn-outline-primary rounded-pill px-3">Conviertete en Glider</a>
                    </li>

                    <!-- Ingresar -->
                    <li class="nav-item me-2">
                      <button type="button" class="btn btn-outline-primary rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#loginModal">
                        Ingresar
                      </button>
                    </li>

                    <!-- Únete -->
                    <li class="nav-item">
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registerModal">
                        Únete
                      </button>
                    </li>
                  @endguest

                  {{-- ============================
                      SI HAY USUARIO AUTENTICADO
                  ============================= --}}
                  @auth
                    <!-- Carrito -->
                    <li class="nav-item me-3">
                      <a href="{{ route('cart.index') }}" class="btn btn-outline-secondary rounded-pill px-3">
                        <i class="ti ti-shopping-cart"></i>
                      </a>
                    </li>

                    <!-- Moneda -->
                    <li class="nav-item dropdown me-3">
                      <a class="nav-link dropdown-toggle btn btn-outline-secondary rounded-pill px-3" href="#" data-bs-toggle="dropdown">
                        Moneda: USD
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">USD</a></li>
                        <li><a class="dropdown-item" href="#">MXN</a></li>
                        <li><a class="dropdown-item" href="#">COL</a></li>
                      </ul>
                    </li>

                    <!-- Notificaciones -->
                    <li class="nav-item dropdown me-3">
                      <a class="nav-link dropdown-toggle btn btn-outline-secondary rounded-pill px-3" href="#" data-bs-toggle="dropdown">
                        <i class="ti ti-bell"></i>
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end">
                        <li><span class="dropdown-item-text">Sin notificaciones</span></li>
                      </ul>
                    </li>

                    <!-- Usuario -->
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle btn btn-outline-secondary rounded-pill px-3" href="#" data-bs-toggle="dropdown">
                        {{ Auth::user()->username }} ({{ Auth::user()->profile->name ?? 'Sin Rol' }})
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ route('profile.show') }}">Mi perfil</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                          <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">Cerrar sesión</button>
                          </form>
                        </li>
                      </ul>
                    </li>
                  @endauth

                </ul>
              </div>
            </div>
          </nav>
        <!-- / Navbar -->





  </div>
</nav>
