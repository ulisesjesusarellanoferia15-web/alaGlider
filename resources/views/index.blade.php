@extends('partials.master')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row g-6">

        <!-- Carrusel principal -->
        <div class="col-xl-12 col" style="height: 400px;">
            <div class="swiper-container swiper-container-horizontal swiper swiper-card-advance-bg"
                id="swiper-with-pagination-cards" style="height: 400px;">
                <div class="swiper-wrapper">
                    <div class="swiper-slide slide-bg" style="background-image: url('../../assets/img/illustrations/banner1.png');">
                        <div class="row h-100 d-flex align-items-center text-center">
                            <div class="col-12">
                                <h1 class="text-white mb-3">AlaGlider</h1>
                                <h4 class="text-white">Te conectamos con freelancers de habla hispana para potenciar tu negocio</h4>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide slide-bg" style="background-image: url('../../assets/img/illustrations/banner2.png');">
                        <div class="row h-100 d-flex align-items-center text-center">
                            <div class="col-12">
                                <h1 class="text-white mb-3">¿Qué es AlaGlider?</h1>
                                <h4 class="text-white">Somos el primer marketplace de contenido digital on demand en español para Latinoamérica</h4>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide slide-bg" style="background-image: url('../../assets/img/illustrations/banner3.png');">
                        <div class="row h-100 d-flex align-items-center text-center">
                            <div class="col-12">
                                <h1 class="text-white mb-3">Nuestra Misión</h1>
                                <h4 class="text-white">Conectar negocios entre empresas de América Latina y freelancers de todo el mundo,<br>creando riqueza y valor a través del contenido digital.</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>



        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row g-6">
                <!-- SECCIÓN CATEGORÍAS -->
                <section class="container my-5 section-categorias">
                    <div class="row gx-5">
                        <!-- Columna principal -->
                        <div class="col-lg-9 mb-5">
                            <h2 class="fw-bold mb-4">Explora Categorías</h2>

                            <!-- Tabs -->
                            <ul class="nav nav-pills mb-4 flex-wrap" id="categoryTabs" role="tablist">
                                @foreach($categories as $category)
                                <li class="nav-item mb-2" role="presentation">
                                    <button class="nav-link {{ $loop->first ? 'active' : '' }}"
                                        id="{{ $category->slug }}-tab"
                                        data-bs-toggle="pill"
                                        data-bs-target="#{{ $category->slug }}"
                                        type="button" role="tab">
                                        {{ $category->name }}
                                    </button>
                                </li>
                                @endforeach
                            </ul>

                            <!-- Contenido de pestañas -->
                            <div class="tab-content" id="categoryTabsContent">
                                @foreach($categories as $category)
                                @php
                                $flights = $category->subcategories->flatMap->flights;
                                @endphp

                                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                    id="{{ $category->slug }}" role="tabpanel">
                                    @if($flights->count() > 0)
                                    <div class="scroll-area-fija">
                                        <div class="scroll-interno">
                                            <div class="row row-cols-1 row-cols-md-3 g-4 m-0">
                                                @foreach($flights as $flight)
                                                <div class="col">
                                                    <div class="card shadow-sm border-0 rounded-4 overflow-hidden h-100">
                                                        <img src="{{ asset($flight->picture_url ?? 'assets/img/front-pages/default.png') }}"
                                                            class="card-img-top" alt="{{ $flight->name }}">
                                                        <div class="card-body">
                                                            @php
                                                            $user = $flight->freelancer->user ?? null;
                                                            @endphp

                                                            <div class="d-flex align-items-center mb-2">
                                                                <img src="{{ $user && $user->picture_profile
                                                                    ? asset('storage/' . ltrim($user->picture_profile, '/'))
                                                                    : asset('assets/img/avatars/1.png') }}"
                                                                    width="32" height="32"
                                                                    class="rounded-circle border me-2"
                                                                    alt="{{ $user->name ?? 'Usuario' }}">

                                                                <span class="fw-bold">
                                                                    {{ trim(($user->name ?? '') . ' ' . ($user->lastname ?? '')) ?: 'Usuario' }}
                                                                </span>
                                                            </div>



                                                            <h6 class="fw-bold mb-1">{{ $flight->name }}</h6>
                                                            <p class="text-muted small mb-2">{{ Str::limit($flight->description, 100, '...') }}</p>
                                                            <div class="d-flex justify-content-between align-items-center mt-auto">
                                                                <span class="text-success fw-bold">Desde ${{ $flight->price ?? '30.00' }}</span>
                                                                <a href="{{ route('flights.show', $flight->id) }}" class="btn btn-outline-primary btn-sm rounded-pill">Ver vuelo</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="alert alert-light text-muted shadow-sm border rounded-3">
                                        <i class="fas fa-info-circle me-2"></i> No hay vuelos disponibles en esta categoría.
                                    </div>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Columna lateral de publicidad -->
                        <div class="col-lg-3">
                            <div class="publicidad-lateral">
                                <h4>¡Freelancers disponibles!</h4>
                                <a href="#" class="btn">VER MÁS</a>
                            </div>
                        </div>

                    </div>
                </section>

                <!-- SECCIÓN GLIDERS Y RIDERS -->
                <section class="container my-5 section-gliders">
                    <div class="row align-items-center g-5">
                        <!-- Columna izquierda: Gliders y Riders -->
                        <div class="col-lg-8">
                            <div class="row g-4">
                                <!-- Gliders -->
                                <div class="col-md-6">
                                    <div class="card text-center shadow-sm border-0 rounded-4 p-4 h-100">
                                        <img src="{{ asset('assets/img/alaglider/glaiders.png') }}" alt="Gliders" class="mx-auto mb-3 glider-logo">
                                        <p class="text-muted small">
                                            Da a conocer tu trabajo a miles de RIDERS y comienza a ganar dinero de inmediato.
                                            Incrementa el rango de tus insignias para obtener mejores comisiones de venta.
                                            ¡Conviértete en Glider PRO y ten mejores beneficios!
                                        </p>
                                        <a href="{{ url('/glider') }}" class="btn btn-outline-success rounded-pill mt-3">REGÍSTRAME COMO GLIDER</a>
                                    </div>
                                </div>

                                <!-- Riders -->
                                <div class="col-md-6">
                                    <div class="card text-center shadow-sm border-0 rounded-4 p-4 h-100">
                                        <img src="{{ asset('assets/img/alaglider/raiders.png') }}" alt="Riders" class="mx-auto mb-3 rider-logo">
                                        <p class="text-muted small">
                                            Contrata a miles de freelancers de toda América Latina y sé parte de la comunidad de Riders.
                                            Mejora tu reputación obteniendo fabulosos beneficios.
                                        </p>
                                        <a href="#" class="btn btn-outline-primary rounded-pill mt-3">REGÍSTRAME COMO RIDER</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Columna derecha: Freelancers destacados -->
                        <!-- Columna derecha: Freelancers destacados -->
                        <div class="col-lg-4">
                            <div class="card shadow-sm border-0 rounded-4 freelancers-card p-4">
                                <h5 class="fw-bold mb-4">FREELANCERS DESTACADOS</h5>

                                @php
                                // Tomamos vuelos activos, con su freelancer y su usuario asociado
                                $featured = \App\Models\Flight::with('freelancer.user')
                                ->where('active', 1)
                                ->inRandomOrder()
                                ->take(6)
                                ->get();
                                @endphp

                                @foreach($featured as $flight)
                                @php
                                $user = optional($flight->freelancer)->user;
                                @endphp

                                <div class="freelancer-item d-flex align-items-center justify-content-between mb-3">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ $user && $user->picture_profile
                                            ? asset('storage/' . ltrim($user->picture_profile, '/'))
                                            : asset('assets/img/avatars/1.png') }}"
                                            alt="{{ $user->name ?? 'Usuario' }}"
                                            class="rounded-circle border me-2"
                                            width="45" height="45">

                                        <div class="info">
                                            <strong>{{ trim(($user->name ?? '') . ' ' . ($user->lastname ?? '')) ?: 'Usuario' }}</strong><br>
                                            <small class="text-muted">
                                                {{ $flight->subcategory->name ?? 'Categoría' }}
                                            </small>
                                        </div>
                                    </div>

                                    <span class="score text-primary fw-bold">
                                        0 <i class="fas fa-paper-plane ms-1"></i>
                                    </span>
                                </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </section>

                <!-- SECCIÓN DE BANNERS -->
                <section class="container my-5">
                    <div class="row g-4 align-items-stretch">
                        <!-- Banner principal -->
                        <div class="col-lg-8">
                            <div class="p-5 text-white rounded-4 h-100 d-flex flex-column justify-content-center position-relative overflow-hidden banner-principal">
                                <img src="{{ asset('assets/img/illustrations/page-pricing-standard.png') }}"
                                    alt="Contenido Digital"
                                    class="banner-image">
                                <div class="position-relative z-2">
                                    <h4 class="fw-semibold mb-3">Creando riqueza y valor<br>a través del contenido digital</h4>
                                    <button class="btn btn-outline-light rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#aboutModal">
                                        Sobre Nosotros
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Banner lateral -->
                        <div class="col-lg-4">
                            <div class="card border-0 shadow-sm rounded-4 p-4 h-100 d-flex flex-column justify-content-center text-center position-relative overflow-hidden banner-lateral">

                                <div class="position-relative z-2">
                                    <h5 class="fw-bold mb-3">Ver Nuestras Categorías</h5>
                                    <a href="{{ url('/category/diseno-grafico') }}" class="btn btn-dark rounded-pill px-4">Categorías</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


                <!-- SECCIÓN SERVICIOS QUE TE PUEDEN INTERESAR -->
                <section class="container my-5 section-interes">
                    <div class="row gx-5 align-items-start">

                        <!-- Columna principal -->
                        <div class="col-lg-9 mb-5">
                            <h3 class="fw-bold mb-4">Servicios que te pueden interesar</h3>

                            <div class="row row-cols-1 row-cols-md-3 g-4">
                                @foreach($recommendedFlights as $flight)
                                @php
                                $user = optional($flight->freelancer)->user;
                                @endphp
                                <div class="col">
                                    <div class="card ag-card shadow-sm border-0 rounded-4 overflow-hidden h-100">
                                        <img src="{{ asset($flight->picture_url ?? 'assets/img/front-pages/default.png') }}"
                                            class="ag-card-image" alt="{{ $flight->name }}">
                                        <div class="ag-card-body p-3 d-flex flex-column">
                                            <div class="d-flex align-items-center mb-2">
                                                <img src="{{ $user && $user->picture_profile
                                        ? asset('storage/' . ltrim($user->picture_profile, '/'))
                                        : asset('assets/img/avatars/1.png') }}"
                                                    width="28" height="28"
                                                    class="rounded-circle border me-2"
                                                    alt="{{ $user->name ?? 'Usuario' }}">
                                                <span class="fw-bold small">
                                                    {{ trim(($user->name ?? '') . ' ' . ($user->lastname ?? '')) ?: 'Usuario' }}
                                                </span>
                                            </div>
                                            <h6 class="fw-bold mb-1">{{ $flight->name }}</h6>
                                            <p class="text-muted small mb-2 flex-grow-1">
                                                {{ $flight->description ? Str::limit($flight->description, 80) : 'Sin descripción disponible.' }}
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center mt-auto">
                                                <span class="price text-success fw-bold">
                                                    Desde ${{ $flight->price ?? '30.00' }}
                                                </span>
                                                <a href="{{ route('flights.show', $flight->id) }}" class="btn btn-outline-primary btn-sm rounded-pill">Ver vuelo</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Columna lateral de publicidad -->
                        <div class="col-lg-3">
                            <div class="publicidad-interes">
                                <h4>Publicidad</h4>
                                <p>Impulsa tu marca con nosotros</p>
                                <a href="#" class="btn">Anunciarme</a>
                            </div>
                        </div>

                    </div>
                </section>

            </div>
        </div>
        @endsection
