@extends('partials.master')
@section('content')
@include('partials.menu')
    {{-- Contenido principal --}}
    <div class="container section-spacing mb-5">
        <h2 class="text-center mb-5">Diseño Grafico</h2>

        <div class="row justify-content-center">
            <!-- Logo -->
            <div class="col-12 col-sm-6 col-md-3 mb-4 text-center">
                <a href="{{ route('subcategories.show', ['categorySlug' => 'diseno-grafico', 'subcategorySlug' => 'logo']) }}" class="subcat-card">
                    <img src="{{ asset('assets/img/front-pages/diseno/logo.jpg') }}" class="img-fluid" alt="Logo">
                    <h5 class="mt-2">Logo</h5>
                </a>
            </div>

            <!-- Diseño de juegos -->
            <div class="col-12 col-sm-6 col-md-3 mb-4 text-center">
                <a href="{{ route('subcategories.show', ['categorySlug' => 'diseno-grafico', 'subcategorySlug' => 'juegos']) }}" class="subcat-card">
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
@endsection
