<!doctype html>
<html lang="es" class="layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr">

<head>
    <meta charset="utf-8" />
    <title>Programación y Desarrollo - AlaGlider</title>
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
                                <li class="menu-item {{ $category->slug === 'programacion-y-desarrollo' ? 'active' : '' }}">
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
                        <h2 class="text-center mb-5">Programación y Desarrollo</h2>

                        <div class="row justify-content-center">
                            <!-- Aplicaciones de escritorio -->
                            <div class="col-12 col-sm-6 col-md-3 mb-4 text-center">
                                <a href="{{ url('/category/programacion-y-desarrollo/appescritorio') }}" class="subcat-card">
                                    <img src="{{ asset('assets/img/front-pages/programacionydesarrollo/appescritorio.jpg') }}" class="img-fluid" alt="Logo">
                                    <h5 class="mt-2">Aplicaciones de escritorio</h5>
                                </a>
                            </div>

                            <!-- Aplicaciones Moviles -->
                            <div class="col-12 col-sm-6 col-md-3 mb-4 text-center">
                                <a href="{{ url('/category/marketing-digital/appmovil') }}" class="subcat-card">
                                    <img src="{{ asset('assets/img/front-pages/programacionydesarrollo/appmovil.jpg') }}" class="img-fluid" alt="Diseño de juegos">
                                    <h5 class="mt-2">Aplicaciones Moviles</h5>
                                </a>
                            </div>

                            <!-- Ciberseguridad y protección de datos -->
                            <div class="col-12 col-sm-6 col-md-3 mb-4 text-center">
                                <a href="{{ url('/category/marketing-digital/ciberseguridad') }}" class="subcat-card">
                                    <img src="{{ asset('assets/img/front-pages/programacionydesarrollo/ciberseguridad.jpg') }}" class="img-fluid" alt="Diseño de juegos">
                                    <h5 class="mt-2">Ciberseguridad y protección de datos</h5>
                                </a>
                            </div>

                            <!-- Bases de Datos -->
                            <div class="col-12 col-sm-6 col-md-3 mb-4 text-center">
                                <a href="{{ url('/category/marketing-digital/db') }}" class="subcat-card">
                                    <img src="{{ asset('assets/img/front-pages/programacionydesarrollo/db.jpg') }}" class="img-fluid" alt="Diseño de juegos">
                                    <h5 class="mt-2">Bases de Datos</h5>
                                </a>
                            </div>

                            <!-- Soporte Técnico -->
                            <div class="col-12 col-sm-6 col-md-3 mb-4 text-center">
                                <a href="{{ url('/category/marketing-digital/st') }}" class="subcat-card">
                                    <img src="{{ asset('assets/img/front-pages/programacionydesarrollo/st.jpg') }}" class="img-fluid" alt="Diseño de juegos">
                                    <h5 class="mt-2">Soporte Técnico</h5>
                                </a>
                            </div>

                            <!-- WordPress -->
                            <div class="col-12 col-sm-6 col-md-3 mb-4 text-center">
                                <a href="{{ url('/category/marketing-digital/wordpress') }}" class="subcat-card">
                                    <img src="{{ asset('assets/img/front-pages/programacionydesarrollo/wordpress.jpg') }}" class="img-fluid" alt="Diseño de juegos">
                                    <h5 class="mt-2">WordPress</h5>
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
