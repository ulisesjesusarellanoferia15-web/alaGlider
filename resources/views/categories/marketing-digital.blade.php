<!doctype html>
<html lang="es" class="layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr">

<head>
    <meta charset="utf-8" />
    <title>Marketing Digital - AlaGlider</title>
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
                                <li class="menu-item {{ $category->slug === 'marketing-digital' ? 'active' : '' }}">
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
                        <h2 class="text-center mb-5">Marketing Digital</h2>

                        <div class="row justify-content-center">
                            <!-- Ecommerce -->
                            <div class="col-12 col-sm-6 col-md-3 mb-4 text-center">
                                <a href="{{ url('/category/marketing-digital/ecommerce') }}" class="subcat-card">
                                    <img src="{{ asset('assets/img/front-pages/marketingDigital/ecommerce.jpg') }}" class="img-fluid" alt="Logo">
                                    <h5 class="mt-2">E-Commerse Marketing</h5>
                                </a>
                            </div>

                            <!-- Encuestas -->
                            <div class="col-12 col-sm-6 col-md-3 mb-4 text-center">
                                <a href="{{ url('/category/marketing-digital/encuestas') }}" class="subcat-card">
                                    <img src="{{ asset('assets/img/front-pages/marketingDigital/encuestas.jpg') }}" class="img-fluid" alt="Diseño de juegos">
                                    <h5 class="mt-2">Encuestas</h5>
                                </a>
                            </div>

                            <!-- Redes Sociales -->
                            <div class="col-12 col-sm-6 col-md-3 mb-4 text-center">
                                <a href="{{ url('/category/marketing-digital/redessociales') }}" class="subcat-card">
                                    <img src="{{ asset('assets/img/front-pages/marketingDigital/redessociales.jpg') }}" class="img-fluid" alt="3D">
                                    <h5 class="mt-2">Redes Sociales</h5>
                                </a>
                            </div>

                            <!-- SEO -->
                            <div class="col-12 col-sm-6 col-md-3 mb-4 text-center">
                                <a href="{{ url('/category/marketing-digital/seo') }}" class="subcat-card">
                                    <img src="{{ asset('assets/img/front-pages/marketingDigital/seo.jpg') }}" class="img-fluid" alt="Ilustraciones">
                                    <h5 class="mt-2">SEO</h5>
                                </a>
                            </div>

                            <!-- Trafico Web -->
                            <div class="col-12 col-sm-6 col-md-3 mb-4 text-center">
                                <a href="{{ url('/category/marketing-digital/traficoweb') }}" class="subcat-card">
                                    <img src="{{ asset('assets/img/front-pages/marketingDigital/traficoweb.jpg') }}" class="img-fluid" alt="Ilustraciones">
                                    <h5 class="mt-2">Tráfico Web</h5>
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
