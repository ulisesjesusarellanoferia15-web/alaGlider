<!doctype html>

<html
  lang="en"
  class="layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-skin="default"
  data-assets-path="../../assets/"
  data-template="horizontal-menu-template"
  data-bs-theme="light">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>AlaGlider</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
      rel="stylesheet" />

    <link rel="stylesheet" href="../../assets/vendor/fonts/iconify-icons.css" />

    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css  -->

    <link rel="stylesheet" href="../../assets/vendor/libs/node-waves/node-waves.css" />

    <link rel="stylesheet" href="../../assets/vendor/libs/pickr/pickr-themes.css" />

    <link rel="stylesheet" href="../../assets/vendor/css/core.css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" />

    <!-- Vendors CSS -->

    <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- endbuild -->

    <link rel="stylesheet" href="../../assets/vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/swiper/swiper.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="../../assets/vendor/css/pages/cards-advance.css" />

    <!-- Helpers -->
    <script src="../../assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->



    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->

    <script src="../../assets/js/config.js"></script>
  </head>

  @include('auth.register-modal')
  @include('auth.login-modal')

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
      <div class="layout-container">
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

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Content wrapper -->
          <div class="content-wrapper">


            <!-- Menu -->
            <aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu flex-grow-0">
              <div class="container-xxl d-flex h-100 justify-content-center align-items-center">
                <ul class="menu-inner">
                    @foreach($categories as $category)
                        <li class="menu-item">
                        <a href="{{ route('categories.show', $category->slug) }}" class="menu-link">
                            {{ $category->name }}
                        </a>
                        </li>
                    @endforeach
                </ul>
              </div>
            </aside>
            <!-- / Menu -->



            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row g-6">
                <!-- Website Analytics -->
                <div class="col-xl-12 col" style="height: 400px;">
                  <div
                    class="swiper-container swiper-container-horizontal swiper swiper-card-advance-bg"
                    id="swiper-with-pagination-cards" style="height: 400px;">

                    <div class="swiper-wrapper">

                      <!-- Slide 1 -->
                      <div class="swiper-slide slide-bg" style="background-image: url('../../assets/img/illustrations/banner1.png');">
                        <div class="row h-100 d-flex align-items-center text-center">
                          <div class="col-12">
                            <h1 class="text-white mb-3">AlaGlider</h1>
                            <h4 class="text-white">Te conectamos con freelancers de habla hispana para potenciar tu negocio</h4>
                          </div>
                        </div>
                      </div>

                      <!-- Slide 2 -->
                      <div class="swiper-slide slide-bg" style="background-image: url('../../assets/img/illustrations/banner2.png');">
                        <div class="row h-100 d-flex align-items-center text-center">
                          <div class="col-12">
                            <h1 class="text-white mb-3">¿Qué es AlaGlider?</h1>
                            <h4 class="text-white">Somos el primer marketplace de contenido digital on demand en español para Latinoamérica</h4>
                          </div>
                        </div>
                      </div>

                      <!-- Slide 3 -->
                      <div class="swiper-slide slide-bg" style="background-image: url('../../assets/img/illustrations/banner3.png');">
                        <div class="row h-100 d-flex align-items-center text-center">
                          <div class="col-12">
                            <h1 class="text-white mb-3">Nuestra Misión</h1>
                            <h4 class="text-white">Conectar negocios entre empresas de América latina y freelancers de todo el mundo,<br>creando riqueza y valor a través del contenido digital.</h4>
                          </div>
                        </div>
                      </div>

                    </div>

                    <!-- Paginación -->
                    <div class="swiper-pagination"></div>
                  </div>
                </div>
                <!--/ Website Analytics -->

                 <!--/ Carrusel de trajetas  -->

                <div id="cardsCarousel" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-inner">

                    @php
                      $chunks = $flights->chunk(3); // 3 tarjetas por fila
                    @endphp

                    @foreach($chunks as $chunkIndex => $chunk)
                      <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">
                        <div class="row justify-content-center">

                          @foreach($chunk as $flight)
                            <div class="col-md-4">
                              <div class="card mb-3">
                                <img src="https://via.placeholder.com/300x180" class="card-img-top" alt="{{ $flight->name }}">
                                <div class="card-body">
                                  <h5 class="card-title">{{ $flight->name }}</h5>
                                  <p class="card-text">{{ Str::limit($flight->description, 100) }}</p>
                                  <div class="d-flex align-items-center mt-3">
                                    <img src="https://via.placeholder.com/40" class="rounded-circle me-2" alt="Perfil">
                                    <span>Freelancer #{{ $flight->id_freelancer }}</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          @endforeach

                        </div>
                      </div>
                    @endforeach

                  </div>

                  <!-- Controles -->
                  <button class="carousel-control-prev" type="button" data-bs-target="#cardsCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bg-dark rounded-circle" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#cardsCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon bg-dark rounded-circle" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                  </button>
                </div>




              </div>
            </div>
            <!--/ Content -->

            <!-- Footer -->
             @include('partials.footer')
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!--/ Content wrapper -->
        </div>

        <!--/ Layout container -->
      </div>
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>

    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>

    <!--/ Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/theme.js -->

    <script src="../../assets/vendor/libs/jquery/jquery.js"></script>

    <script src="../../assets/vendor/libs/popper/popper.js"></script>
    <script src="../../assets/vendor/js/bootstrap.js"></script>
    <script src="../../assets/vendor/libs/node-waves/node-waves.js"></script>

    <script src="../../assets/vendor/libs/@algolia/autocomplete-js.js"></script>

    <script src="../../assets/vendor/libs/pickr/pickr.js"></script>

    <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../../assets/vendor/libs/hammer/hammer.js"></script>

    <script src="../../assets/vendor/libs/i18n/i18n.js"></script>

    <script src="../../assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../../assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="../../assets/vendor/libs/swiper/swiper.js"></script>
    <script src="../../assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>

    <!-- Main JS -->

    <script src="../../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../../assets/js/dashboards-analytics.js"></script>
  </body>
</html>
