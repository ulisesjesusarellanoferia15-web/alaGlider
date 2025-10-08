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
                <section class="container my-5">
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
                                    <div class="row row-cols-1 row-cols-md-3 g-4">
                                        @foreach($flights as $flight)
                                        <div class="col">
                                            <div class="card shadow-sm border-0 rounded-4 overflow-hidden h-100">
                                                <img src="{{ asset($flight->picture_url ?? 'assets/img/front-pages/default.jpg') }}"
                                                    class="card-img-top" alt="{{ $flight->name }}">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <img src="{{ asset('assets/img/avatars/1.png') }}" width="32" height="32"
                                                            class="rounded-circle border me-2" alt="Freelancer">
                                                        <span class="fw-bold">{{ $flight->freelancer->name ?? 'Freelancer' }}</span>
                                                    </div>
                                                    <h6 class="fw-bold mb-1">{{ $flight->name }}</h6>
                                                    <p class="text-muted small mb-2">{{ Str::limit($flight->description, 100, '...') }}</p>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <span class="text-success fw-bold">Desde ${{ $flight->price ?? '30.00' }}</span>
                                                        <a href="#" class="btn btn-outline-primary btn-sm rounded-pill">Ver vuelo</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
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
                        <div class="col-lg-3 position-relative">
                            <div class="p-4 rounded-4 text-center text-white sticky-top"
                                style="background: linear-gradient(135deg,#2563eb,#06b6d4); top: 80px;">
                                <h4 class="fw-bold mb-3">¡Freelancers disponibles!</h4>
                                <img src="{{ asset('assets/img/illustrations/pencil-rocket.png') }}" class="img-fluid mb-3" alt="Publicidad">
                                <a href="#" class="btn btn-light rounded-pill px-4">VER MÁS</a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>


@endsection
