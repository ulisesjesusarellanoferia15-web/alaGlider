<!doctype html>
<html lang="es" class="layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr">

<head>
    <meta charset="utf-8" />
    <title>Video y Animación - AlaGlider</title>
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
                                <li class="menu-item {{ $category->slug === 'video-y-animacion' ? 'active' : '' }}">
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
                        <h2 class="text-center mb-5">Video y Animación</h2>

                        <div class="row justify-content-center">
                            <!-- Animaciones y personajes -->
                            <div class="col-12 col-sm-6 col-md-3 mb-4 text-center">
                                <a href="{{ url('/category/video-y-animacion/personajes') }}" class="subcat-card">
                                    <img src="{{ asset('assets/img/front-pages/videoyanimacion/personajes.jpg') }}" class="img-fluid" alt="Logo">
                                    <h5 class="mt-2">Animaciones y personajes</h5>
                                </a>
                            </div>

                            <!-- Producciones de animación 3D -->
                            <div class="col-12 col-sm-6 col-md-3 mb-4 text-center">
                                <a href="{{ url('/category/video-y-animacion/producciones3d') }}" class="subcat-card">
                                    <img src="{{ asset('assets/img/front-pages/videoyanimacion/producciones3d.jpg') }}" class="img-fluid" alt="Logo">
                                    <h5 class="mt-2">Producciones de animación 3D</h5>
                                </a>
                            </div>

                            <!-- Subtitulos y leyendas -->
                            <div class="col-12 col-sm-6 col-md-3 mb-4 text-center">
                                <a href="{{ url('/category/video-y-animacion/subtitulos') }}" class="subcat-card">
                                    <img src="{{ asset('assets/img/front-pages/videoyanimacion/subtitulos.jpg') }}" class="img-fluid" alt="Logo">
                                    <h5 class="mt-2">Subtitulos y leyendas</h5>
                                </a>
                            </div>

                            <!-- Edición de video -->
                            <div class="col-12 col-sm-6 col-md-3 mb-4 text-center">
                                <a href="{{ url('/category/video-y-animacion/video') }}" class="subcat-card">
                                    <img src="{{ asset('assets/img/front-pages/videoyanimacion/video.jpg') }}" class="img-fluid" alt="Logo">
                                    <h5 class="mt-2">Edición de video</h5>
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
