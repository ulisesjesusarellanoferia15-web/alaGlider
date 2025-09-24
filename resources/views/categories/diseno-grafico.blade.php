<!doctype html>
<html lang="es" class="layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr">

<head>
    <meta charset="utf-8" />
    <title>Diseño Gráfico - AlaGlider</title>
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
</head>

<body>
    <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
        <div class="layout-container">

            {{-- Navbar (copiado igual que en index.blade.php) --}}
            @include('partials.navbar')

            <div class="layout-page">
                <div class="content-wrapper">

                    {{-- Menú dinámico de categorías --}}
                    <aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu flex-grow-0">
                        <div class="container-xxl d-flex h-100 justify-content-center align-items-center">
                            <ul class="menu-inner">
                                @foreach($categories as $category)
                                <li class="menu-item {{ $category->slug === 'diseno-grafico' ? 'active' : '' }}">
                                    <a href="{{ route('categories.show', $category->slug) }}" class="menu-link">
                                        {{ $category->name }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                    <br><br><br><br>

                    {{-- Contenido principal --}}
                    <div class="container section-spacing mb-5">
                        <h2 class="text-center mb-5">Diseño Grafico</h2>

                        <div class="row justify-content-center">
                            <!-- Logo -->
                            <div class="col-12 col-sm-6 col-md-3 mb-4 text-center">
                                <a href="{{ url('/category/diseno-grafico/logo') }}" class="subcat-card">
                                    <img src="{{ asset('assets/img/front-pages/diseno/logo.jpg') }}" class="img-fluid" alt="Logo">
                                    <h5 class="mt-2">Logo</h5>
                                </a>
                            </div>

                            <!-- Diseño de juegos -->
                            <div class="col-12 col-sm-6 col-md-3 mb-4 text-center">
                                <a href="{{ url('/category/diseno-grafico/games') }}" class="subcat-card">
                                    <img src="{{ asset('assets/img/front-pages/diseno/games.jpg') }}" class="img-fluid" alt="Diseño de juegos">
                                    <h5 class="mt-2">Diseño de juegos</h5>
                                </a>
                            </div>

                            <!-- 3D -->
                            <div class="col-12 col-sm-6 col-md-3 mb-4 text-center">
                                <a href="{{ url('/category/diseno-grafico/3d') }}" class="subcat-card">
                                    <img src="{{ asset('assets/img/front-pages/diseno/3d.jpg') }}" class="img-fluid" alt="3D">
                                    <h5 class="mt-2">3D</h5>
                                </a>
                            </div>

                            <!-- Ilustraciones -->
                            <div class="col-12 col-sm-6 col-md-3 mb-4 text-center">
                                <a href="{{ url('/category/diseno-grafico/ilustraciones') }}" class="subcat-card">
                                    <img src="{{ asset('assets/img/front-pages/diseno/ilustraciones.jpg') }}" class="img-fluid" alt="Ilustraciones">
                                    <h5 class="mt-2">Ilustraciones</h5>
                                </a>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

            @include('partials.footer')

        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
