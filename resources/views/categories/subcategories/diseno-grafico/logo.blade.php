@extends('partials.master')
@section('content')
    <div class="container">
        <h2 class="text-bold text-center mb-4">Diseño Gráfico - Logos</h2>

        <div class="row">
            {{-- Tarjeta 1 --}}
            <div class="col-md-4 mb-4">
                <div class="ag-card">
                    {{-- Carrusel --}}
                    <div id="logoCarousel1" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100 rounded-top ag-card-image"
                                     src="{{ asset('assets/img/front-pages/diseno/logo.jpg') }}" alt="Logo ejemplo 1">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100 rounded-top ag-card-image"
                                     src="{{ asset('assets/img/front-pages/diseno/3d.jpg') }}" alt="Logo ejemplo 2">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#logoCarousel1" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#logoCarousel1" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>

                    {{-- Info del card --}}
                    <div class="ag-card-body">
                        <div class="d-flex align-items-center mb-2">
                            <img class="rounded-circle border me-2" width="32" height="32"
                                 src="{{ asset('assets/img/avatars/1.png') }}" alt="Normix">
                            <span class="fw-bold">Miguel</span>
                        </div>
                        <h5 class="mb-2">Logo Minimalista</h5>
                        <p class="mb-2 text-muted">Diseño profesional y moderno.</p>

                        <div class="d-flex justify-content-between align-items-center">
                            <span class="price text-success fw-bold">Desde $30.00</span>
                            <div class="actions">
                                <i class="far fa-heart mx-1"></i>
                                <i class="fas fa-share-alt mx-1"></i>
                                <i class="fas fa-cart-plus mx-1"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tarjeta 2 --}}
            <div class="col-md-4 mb-4">
                <div class="ag-card">
                    <div id="logoCarousel2" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100 rounded-top ag-card-image"
                                     src="{{ asset('assets/img/front-pages/diseno/ilustraciones.jpg') }}" alt="Logo ejemplo 3">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100 rounded-top ag-card-image"
                                     src="{{ asset('assets/img/front-pages/diseno/games.jpg') }}" alt="Logo ejemplo 4">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#logoCarousel2" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#logoCarousel2" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>

                    <div class="ag-card-body">
                        <div class="d-flex align-items-center mb-2">
                            <img class="rounded-circle border me-2" width="32" height="32"
                                 src="{{ asset('assets/img/avatars/2.png') }}" alt="Aladelta">
                            <span class="fw-bold">ALADELTA</span>
                        </div>
                        <h5 class="mb-2">Logo Creativo</h5>
                        <p class="mb-2 text-muted">Perfecto para startups digitales.</p>

                        <div class="d-flex justify-content-between align-items-center">
                            <span class="price text-success fw-bold">Desde $40.00</span>
                            <div class="actions">
                                <i class="far fa-heart mx-1"></i>
                                <i class="fas fa-share-alt mx-1"></i>
                                <i class="fas fa-cart-plus mx-1"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
