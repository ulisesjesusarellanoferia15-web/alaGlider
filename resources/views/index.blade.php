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

    <title>Demo: Dashboard - Analytics | Vuexy - Bootstrap Dashboard PRO</title>

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

    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="../../assets/vendor/js/template-customizer.js"></script>

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->

    <script src="../../assets/js/config.js"></script>
  </head>

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
                      <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" width="150px" />
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
                      <a href="{{ route('login') }}" class="btn btn-outline-primary rounded-pill px-3">Ingresar</a>
                    </li>

                    <!-- Únete -->
                    <li class="nav-item">
                      <a href="{{ route('register') }}" class="btn btn-primary rounded-pill px-3">Únete</a>
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
                      <a href="{{ url('category/'.$category->name) }}" class="menu-link">
                        <!--<i class="menu-icon icon-base ti tabler-layout-grid"></i>-->
                        <div>{{ $category->name }}</div>
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

                <!-- Average Daily Sales -->
                <div class="col-xl-3 col-sm-6">
                  <div class="card h-100">
                    <div class="card-header pb-0">
                      <h5 class="mb-3 card-title">Average Daily Sales</h5>
                      <p class="mb-0 text-body">Total Sales This Month</p>
                      <h4 class="mb-0">$28,450</h4>
                    </div>
                    <div class="card-body px-0">
                      <div id="averageDailySales"></div>
                    </div>
                  </div>
                </div>
                <!--/ Average Daily Sales -->

                <!-- Sales Overview -->
                <div class="col-xl-3 col-sm-6">
                  <div class="card h-100">
                    <div class="card-header">
                      <div class="d-flex justify-content-between">
                        <p class="mb-0 text-body">Sales Overview</p>
                        <p class="card-text fw-medium text-success">+18.2%</p>
                      </div>
                      <h4 class="card-title mb-1">$42.5k</h4>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-4">
                          <div class="d-flex gap-2 align-items-center mb-2">
                            <span class="badge bg-label-info p-1 rounded"
                              ><i class="icon-base ti tabler-shopping-cart icon-sm"></i
                            ></span>
                            <p class="mb-0">Order</p>
                          </div>
                          <h5 class="mb-0 pt-1">62.2%</h5>
                          <small class="text-body-secondary">6,440</small>
                        </div>
                        <div class="col-4">
                          <div class="divider divider-vertical">
                            <div class="divider-text">
                              <span class="badge-divider-bg bg-label-secondary">VS</span>
                            </div>
                          </div>
                        </div>
                        <div class="col-4 text-end">
                          <div class="d-flex gap-2 justify-content-end align-items-center mb-2">
                            <p class="mb-0">Visits</p>
                            <span class="badge bg-label-primary p-1 rounded"
                              ><i class="icon-base ti tabler-link icon-sm"></i
                            ></span>
                          </div>
                          <h5 class="mb-0 pt-1">25.5%</h5>
                          <small class="text-body-secondary">12,749</small>
                        </div>
                      </div>
                      <div class="d-flex align-items-center mt-6">
                        <div class="progress w-100" style="height: 10px">
                          <div
                            class="progress-bar bg-info"
                            style="width: 70%"
                            role="progressbar"
                            aria-valuenow="70"
                            aria-valuemin="0"
                            aria-valuemax="100"></div>
                          <div
                            class="progress-bar bg-primary"
                            role="progressbar"
                            style="width: 30%"
                            aria-valuenow="30"
                            aria-valuemin="0"
                            aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Sales Overview -->

                <!-- Earning Reports -->
                <div class="col-md-6">
                  <div class="card h-100">
                    <div class="card-header pb-0 d-flex justify-content-between">
                      <div class="card-title mb-0">
                        <h5 class="mb-1">Earning Reports</h5>
                        <p class="card-subtitle">Weekly Earnings Overview</p>
                      </div>
                      <div class="dropdown">
                        <button
                          class="btn btn-text-secondary rounded-pill text-body-secondary border-0 p-2 me-n1"
                          type="button"
                          id="earningReportsId"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false">
                          <i class="icon-base ti tabler-dots-vertical icon-md text-body-secondary"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="earningReportsId">
                          <a class="dropdown-item" href="javascript:void(0);">View More</a>
                          <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="row align-items-center g-md-8">
                        <div class="col-12 col-md-5 d-flex flex-column">
                          <div class="d-flex gap-2 align-items-center mb-3 flex-wrap">
                            <h2 class="mb-0">$468</h2>
                            <div class="badge rounded bg-label-success">+4.2%</div>
                          </div>
                          <small class="text-body">You informed of this week compared to last week</small>
                        </div>
                        <div class="col-12 col-md-7 ps-xl-8">
                          <div id="weeklyEarningReports"></div>
                        </div>
                      </div>
                      <div class="border rounded p-5 mt-5">
                        <div class="row gap-4 gap-sm-0">
                          <div class="col-12 col-sm-4">
                            <div class="d-flex gap-2 align-items-center">
                              <div class="badge rounded bg-label-primary p-1">
                                <i class="icon-base ti tabler-currency-dollar icon-18px"></i>
                              </div>
                              <h6 class="mb-0 fw-normal">Earnings</h6>
                            </div>
                            <h4 class="my-2">$545.69</h4>
                            <div class="progress w-75" style="height: 4px">
                              <div
                                class="progress-bar"
                                role="progressbar"
                                style="width: 65%"
                                aria-valuenow="65"
                                aria-valuemin="0"
                                aria-valuemax="100"></div>
                            </div>
                          </div>
                          <div class="col-12 col-sm-4">
                            <div class="d-flex gap-2 align-items-center">
                              <div class="badge rounded bg-label-info p-1">
                                <i class="icon-base ti tabler-chart-pie-2 icon-18px"></i>
                              </div>
                              <h6 class="mb-0 fw-normal">Profit</h6>
                            </div>
                            <h4 class="my-2">$256.34</h4>
                            <div class="progress w-75" style="height: 4px">
                              <div
                                class="progress-bar bg-info"
                                role="progressbar"
                                style="width: 50%"
                                aria-valuenow="50"
                                aria-valuemin="0"
                                aria-valuemax="100"></div>
                            </div>
                          </div>
                          <div class="col-12 col-sm-4">
                            <div class="d-flex gap-2 align-items-center">
                              <div class="badge rounded bg-label-danger p-1">
                                <i class="icon-base ti tabler-brand-paypal icon-18px"></i>
                              </div>
                              <h6 class="mb-0 fw-normal">Expense</h6>
                            </div>
                            <h4 class="my-2">$74.19</h4>
                            <div class="progress w-75" style="height: 4px">
                              <div
                                class="progress-bar bg-danger"
                                role="progressbar"
                                style="width: 65%"
                                aria-valuenow="65"
                                aria-valuemin="0"
                                aria-valuemax="100"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Earning Reports -->

                <!-- Support Tracker -->
                <div class="col-12 col-md-6">
                  <div class="card h-100">
                    <div class="card-header d-flex justify-content-between">
                      <div class="card-title mb-0">
                        <h5 class="mb-1">Support Tracker</h5>
                        <p class="card-subtitle">Last 7 Days</p>
                      </div>
                      <div class="dropdown">
                        <button
                          class="btn btn-text-secondary rounded-pill text-body-secondary border-0 p-2 me-n1"
                          type="button"
                          id="supportTrackerMenu"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false">
                          <i class="icon-base ti tabler-dots-vertical icon-md text-body-secondary"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="supportTrackerMenu">
                          <a class="dropdown-item" href="javascript:void(0);">View More</a>
                          <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                        </div>
                      </div>
                    </div>
                    <div class="card-body row">
                      <div class="col-12 col-sm-4">
                        <div class="mt-lg-4 mt-lg-2 mb-lg-6 mb-2">
                          <h2 class="mb-0">164</h2>
                          <p class="mb-0">Total Tickets</p>
                        </div>
                        <ul class="p-0 m-0">
                          <li class="d-flex gap-4 align-items-center mb-lg-3 pb-1">
                            <div class="badge rounded bg-label-primary p-1_5">
                              <i class="icon-base ti tabler-ticket icon-md"></i>
                            </div>
                            <div>
                              <h6 class="mb-0 text-nowrap">New Tickets</h6>
                              <small class="text-body-secondary">142</small>
                            </div>
                          </li>
                          <li class="d-flex gap-4 align-items-center mb-lg-3 pb-1">
                            <div class="badge rounded bg-label-info p-1_5">
                              <i class="icon-base ti tabler-circle-check icon-md"></i>
                            </div>
                            <div>
                              <h6 class="mb-0 text-nowrap">Open Tickets</h6>
                              <small class="text-body-secondary">28</small>
                            </div>
                          </li>
                          <li class="d-flex gap-4 align-items-center pb-1">
                            <div class="badge rounded bg-label-warning p-1_5">
                              <i class="icon-base ti tabler-clock icon-md"></i>
                            </div>
                            <div>
                              <h6 class="mb-0 text-nowrap">Response Time</h6>
                              <small class="text-body-secondary">1 Day</small>
                            </div>
                          </li>
                        </ul>
                      </div>
                      <div class="col-12 col-md-8">
                        <div id="supportTracker"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Support Tracker -->

                <!-- Sales By Country -->
                <div class="col-xxl-4 col-md-6 order-1 order-xl-0">
                  <div class="card h-100">
                    <div class="card-header d-flex justify-content-between">
                      <div class="card-title mb-0">
                        <h5 class="mb-1">Sales by Countries</h5>
                        <p class="card-subtitle">Monthly Sales Overview</p>
                      </div>
                      <div class="dropdown">
                        <button
                          class="btn btn-text-secondary btn-icon rounded-pill text-body-secondary border-0 me-n1"
                          type="button"
                          id="salesByCountry"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false">
                          <i class="icon-base ti tabler-dots-vertical icon-22px text-body-secondary"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="salesByCountry">
                          <a class="dropdown-item" href="javascript:void(0);">Download</a>
                          <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                          <a class="dropdown-item" href="javascript:void(0);">Share</a>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <ul class="p-0 m-0">
                        <li class="d-flex align-items-center mb-4">
                          <div class="avatar flex-shrink-0 me-4">
                            <i class="fis fi fi-us rounded-circle fs-2"></i>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <div class="d-flex align-items-center">
                                <h6 class="mb-0 me-1">$8,567k</h6>
                              </div>
                              <small class="text-body">United states</small>
                            </div>
                            <div class="user-progress">
                              <p class="text-success fw-medium mb-0 d-flex align-items-center gap-1">
                                <i class="icon-base ti tabler-chevron-up"></i>
                                25.8%
                              </p>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                          <div class="avatar flex-shrink-0 me-4">
                            <i class="fis fi fi-br rounded-circle fs-2"></i>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <div class="d-flex align-items-center">
                                <h6 class="mb-0 me-1">$2,415k</h6>
                              </div>
                              <small class="text-body">Brazil</small>
                            </div>
                            <div class="user-progress">
                              <p class="text-danger fw-medium mb-0 d-flex align-items-center gap-1">
                                <i class="icon-base ti tabler-chevron-down"></i>
                                6.2%
                              </p>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                          <div class="avatar flex-shrink-0 me-4">
                            <i class="fis fi fi-in rounded-circle fs-2"></i>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <div class="d-flex align-items-center">
                                <h6 class="mb-0 me-1">$865k</h6>
                              </div>
                              <small class="text-body">India</small>
                            </div>
                            <div class="user-progress">
                              <p class="text-success fw-medium mb-0 d-flex align-items-center gap-1">
                                <i class="icon-base ti tabler-chevron-up"></i>
                                12.4%
                              </p>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                          <div class="avatar flex-shrink-0 me-4">
                            <i class="fis fi fi-au rounded-circle fs-2"></i>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <div class="d-flex align-items-center">
                                <h6 class="mb-0 me-1">$745k</h6>
                              </div>
                              <small class="text-body">Australia</small>
                            </div>
                            <div class="user-progress">
                              <p class="text-danger fw-medium mb-0 d-flex align-items-center gap-1">
                                <i class="icon-base ti tabler-chevron-down"></i>
                                11.9%
                              </p>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                          <div class="avatar flex-shrink-0 me-4">
                            <i class="fis fi fi-fr rounded-circle fs-2"></i>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <div class="d-flex align-items-center">
                                <h6 class="mb-0 me-1">$45</h6>
                              </div>
                              <small class="text-body">France</small>
                            </div>
                            <div class="user-progress">
                              <p class="text-success fw-medium mb-0 d-flex align-items-center gap-1">
                                <i class="icon-base ti tabler-chevron-up"></i>
                                16.2%
                              </p>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex align-items-center">
                          <div class="avatar flex-shrink-0 me-4">
                            <i class="fis fi fi-cn rounded-circle fs-2"></i>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <div class="d-flex align-items-center">
                                <h6 class="mb-0 me-1">$12k</h6>
                              </div>
                              <small class="text-body">China</small>
                            </div>
                            <div class="user-progress">
                              <p class="text-success fw-medium mb-0 d-flex align-items-center gap-1">
                                <i class="icon-base ti tabler-chevron-up"></i>
                                14.8%
                              </p>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <!--/ Sales By Country -->

                <!-- Total Earning -->
                <div class="col-12 col-md-6 col-xxl-4 order-2 order-xl-0">
                  <div class="card h-100">
                    <div class="card-header">
                      <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 card-title">Total Earning</h5>
                        <div class="dropdown">
                          <button
                            class="btn btn-text-secondary rounded-pill text-body-secondary border-0 p-2 me-n1"
                            type="button"
                            id="totalEarning"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false">
                            <i class="icon-base ti tabler-dots-vertical icon-md text-body-secondary"></i>
                          </button>
                          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="totalEarning">
                            <a class="dropdown-item" href="javascript:void(0);">View More</a>
                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex align-items-center">
                        <h2 class="mb-0 me-2">87%</h2>
                        <i class="icon-base ti tabler-chevron-up text-success me-1"></i>
                        <h6 class="text-success mb-0">25.8%</h6>
                      </div>
                    </div>
                    <div class="card-body">
                      <div id="totalEarningChart"></div>
                      <div class="d-flex align-items-start my-4">
                        <div class="badge rounded bg-label-primary p-2 me-4 rounded">
                          <i class="icon-base ti tabler-brand-paypal icon-md"></i>
                        </div>
                        <div class="d-flex justify-content-between w-100 gap-2 align-items-center">
                          <div class="me-2">
                            <h6 class="mb-0">Total Revenue</h6>
                            <small class="text-body">Client Payment</small>
                          </div>
                          <h6 class="mb-0 text-success">+$126</h6>
                        </div>
                      </div>
                      <div class="d-flex align-items-start">
                        <div class="badge rounded bg-label-secondary p-2 me-4 rounded">
                          <i class="icon-base ti tabler-currency-dollar icon-md"></i>
                        </div>
                        <div class="d-flex justify-content-between w-100 gap-2 align-items-center">
                          <div class="me-2">
                            <h6 class="mb-0">Total Sales</h6>
                            <small class="text-body">Refund</small>
                          </div>
                          <h6 class="mb-0 text-success">+$98</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Total Earning -->

                <!-- Monthly Campaign State -->
                <div class="col-xxl-4 col-md-6">
                  <div class="card h-100">
                    <div class="card-header d-flex justify-content-between">
                      <div class="card-title mb-0">
                        <h5 class="mb-1">Monthly Campaign State</h5>
                        <p class="card-subtitle">8.52k Social Visiters</p>
                      </div>
                      <div class="dropdown">
                        <button
                          class="btn btn-text-secondary rounded-pill text-body-secondary border-0 p-2 me-n1"
                          type="button"
                          id="MonthlyCampaign"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false">
                          <i class="icon-base ti tabler-dots-vertical icon-md text-body-secondary"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="MonthlyCampaign">
                          <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                          <a class="dropdown-item" href="javascript:void(0);">Download</a>
                          <a class="dropdown-item" href="javascript:void(0);">View All</a>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <ul class="p-0 m-0">
                        <li class="mb-6 d-flex justify-content-between align-items-center">
                          <div class="badge bg-label-success rounded p-1_5">
                            <i class="icon-base ti tabler-mail icon-md"></i>
                          </div>
                          <div class="d-flex justify-content-between w-100 flex-wrap">
                            <h6 class="mb-0 ms-4">Emails</h6>
                            <div class="d-flex">
                              <p class="mb-0">12,346</p>
                              <p class="ms-4 text-success mb-0">0.3%</p>
                            </div>
                          </div>
                        </li>
                        <li class="mb-6 d-flex justify-content-between align-items-center">
                          <div class="badge bg-label-info rounded p-1_5">
                            <i class="icon-base ti tabler-link icon-md"></i>
                          </div>
                          <div class="d-flex justify-content-between w-100 flex-wrap">
                            <h6 class="mb-0 ms-4">Opened</h6>
                            <div class="d-flex">
                              <p class="mb-0">8,734</p>
                              <p class="ms-4 text-success mb-0">2.1%</p>
                            </div>
                          </div>
                        </li>
                        <li class="mb-6 d-flex justify-content-between align-items-center">
                          <div class="badge bg-label-warning rounded p-1_5">
                            <i class="icon-base ti tabler-mouse icon-md"></i>
                          </div>
                          <div class="d-flex justify-content-between w-100 flex-wrap">
                            <h6 class="mb-0 ms-4">Clicked</h6>
                            <div class="d-flex">
                              <p class="mb-0">967</p>
                              <p class="ms-4 text-danger mb-0">1.4%</p>
                            </div>
                          </div>
                        </li>
                        <li class="mb-6 d-flex justify-content-between align-items-center">
                          <div class="badge bg-label-primary rounded p-1_5">
                            <i class="icon-base ti tabler-users icon-md"></i>
                          </div>
                          <div class="d-flex justify-content-between w-100 flex-wrap">
                            <h6 class="mb-0 ms-4">Subscribe</h6>
                            <div class="d-flex">
                              <p class="mb-0">345</p>
                              <p class="ms-4 text-success mb-0">8.5%</p>
                            </div>
                          </div>
                        </li>
                        <li class="mb-6 d-flex justify-content-between align-items-center">
                          <div class="badge bg-label-secondary rounded p-1_5">
                            <i class="icon-base ti tabler-alert-triangle icon-md"></i>
                          </div>
                          <div class="d-flex justify-content-between w-100 flex-wrap">
                            <h6 class="mb-0 ms-4">Complaints</h6>
                            <div class="d-flex">
                              <p class="mb-0">10</p>
                              <p class="ms-4 text-danger mb-0">1.5%</p>
                            </div>
                          </div>
                        </li>
                        <li class="mb-3 d-flex justify-content-between align-items-center">
                          <div class="badge bg-label-danger rounded p-1_5">
                            <i class="icon-base ti tabler-ban icon-md"></i>
                          </div>
                          <div class="d-flex justify-content-between w-100 flex-wrap">
                            <h6 class="mb-0 ms-4">Unsubscribe</h6>
                            <div class="d-flex">
                              <p class="mb-0">86</p>
                              <p class="ms-4 text-success mb-0">0.8%</p>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <!--/ Monthly Campaign State -->

                <!-- Source Visit -->
                <div class="col-xxl-4 col-md-6 col-12">
                  <div class="card h-100">
                    <div class="card-header d-flex justify-content-between">
                      <div class="card-title mb-0">
                        <h5 class="mb-1">Source Visits</h5>
                        <p class="card-subtitle">38.4k Visitors</p>
                      </div>
                      <div class="dropdown">
                        <button
                          class="btn btn-text-secondary rounded-pill text-body-secondary border-0 p-2 me-n1"
                          type="button"
                          id="sourceVisits"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false">
                          <i class="icon-base ti tabler-dots-vertical icon-md text-body-secondary"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sourceVisits">
                          <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                          <a class="dropdown-item" href="javascript:void(0);">Download</a>
                          <a class="dropdown-item" href="javascript:void(0);">View All</a>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <ul class="list-unstyled mb-0">
                        <li class="mb-6">
                          <div class="d-flex align-items-center">
                            <div class="badge bg-label-secondary text-body p-2 me-4 rounded">
                              <i class="icon-base ti tabler-shadow icon-md"></i>
                            </div>
                            <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
                              <div class="me-2">
                                <h6 class="mb-0">Direct Source</h6>
                                <small class="text-body">Direct link click</small>
                              </div>
                              <div class="d-flex align-items-center">
                                <p class="mb-0">1.2k</p>
                                <div class="ms-4 badge bg-label-success">+4.2%</div>
                              </div>
                            </div>
                          </div>
                        </li>
                        <li class="mb-6">
                          <div class="d-flex align-items-center">
                            <div class="badge bg-label-secondary text-body p-2 me-4 rounded">
                              <i class="icon-base ti tabler-globe icon-md"></i>
                            </div>
                            <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
                              <div class="me-2">
                                <h6 class="mb-0">Social Network</h6>
                                <small class="text-body">Social Channels</small>
                              </div>
                              <div class="d-flex align-items-center">
                                <p class="mb-0">31.5k</p>
                                <div class="ms-4 badge bg-label-success">+8.2%</div>
                              </div>
                            </div>
                          </div>
                        </li>
                        <li class="mb-6">
                          <div class="d-flex align-items-center">
                            <div class="badge bg-label-secondary text-body p-2 me-4 rounded">
                              <i class="icon-base ti tabler-mail icon-md"></i>
                            </div>
                            <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
                              <div class="me-2">
                                <h6 class="mb-0">Email Newsletter</h6>
                                <small class="text-body">Mail Campaigns</small>
                              </div>
                              <div class="d-flex align-items-center">
                                <p class="mb-0">893</p>
                                <div class="ms-4 badge bg-label-success">+2.4%</div>
                              </div>
                            </div>
                          </div>
                        </li>
                        <li class="mb-6">
                          <div class="d-flex align-items-center">
                            <div class="badge bg-label-secondary text-body p-2 me-4 rounded">
                              <i class="icon-base ti tabler-external-link icon-md"></i>
                            </div>
                            <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
                              <div class="me-2">
                                <h6 class="mb-0">Referrals</h6>
                                <small class="text-body">Impact Radius Visits</small>
                              </div>
                              <div class="d-flex align-items-center">
                                <p class="mb-0">342</p>
                                <div class="ms-4 badge bg-label-danger">-0.4%</div>
                              </div>
                            </div>
                          </div>
                        </li>
                        <li class="mb-6">
                          <div class="d-flex align-items-center">
                            <div class="badge bg-label-secondary text-body p-2 me-4 rounded">
                              <i class="icon-base ti tabler-ad icon-md"></i>
                            </div>
                            <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
                              <div class="me-2">
                                <h6 class="mb-0">ADVT</h6>
                                <small class="text-body">Google ADVT</small>
                              </div>
                              <div class="d-flex align-items-center">
                                <p class="mb-0">2.15k</p>
                                <div class="ms-4 badge bg-label-success">+9.1%</div>
                              </div>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="d-flex align-items-center">
                            <div class="badge bg-label-secondary text-body p-2 me-4 rounded">
                              <i class="icon-base ti tabler-star icon-md"></i>
                            </div>
                            <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
                              <div class="me-2">
                                <h6 class="mb-0">Other</h6>
                                <small class="text-body">Many Sources</small>
                              </div>
                              <div class="d-flex align-items-center">
                                <p class="mb-0">12.5k</p>
                                <div class="ms-4 badge bg-label-success">+6.2%</div>
                              </div>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <!--/ Source Visit -->

                <!-- Projects table -->
                <div class="col-xxl-8">
                  <div class="card">
                    <div class="table-responsive mb-4">
                      <table class="table datatable-project table-sm">
                        <thead class="border-top">
                          <tr>
                            <th></th>
                            <th></th>
                            <th>Project</th>
                            <th>Leader</th>
                            <th>Team</th>
                            <th class="w-px-200">Progress</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                      </table>
                    </div>
                  </div>
                </div>
                <!--/ Projects table -->
              </div>
            </div>
            <!--/ Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl">
                <div
                  class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                  <div class="text-body">
                    ©
                    <script>
                      document.write(new Date().getFullYear());
                    </script>
                    , made with ❤️ by <a href="https://pixinvent.com" target="_blank" class="footer-link">Pixinvent</a>
                  </div>
                  <div class="d-none d-lg-inline-block">
                    <a href="https://themeforest.net/licenses/standard" class="footer-link me-4" target="_blank"
                      >License</a
                    >
                    <a href="https://themeforest.net/user/pixinvent/portfolio" target="_blank" class="footer-link me-4"
                      >More Themes</a
                    >

                    <a
                      href="https://demos.pixinvent.com/vuexy-html-admin-template/documentation/"
                      target="_blank"
                      class="footer-link me-4"
                      >Documentation</a
                    >

                    <a href="https://pixinvent.ticksy.com/" target="_blank" class="footer-link d-none d-sm-inline-block"
                      >Support</a
                    >
                  </div>
                </div>
              </div>
            </footer>
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
