@extends('partials.master')
@section('content')
@include('partials.menu')
{{-- Contenido principal --}}
<div class="container section-spacing mb-5">
    <h2 class="text-center mb-5">Escritura y Traducción</h2>

    <div class="row justify-content-center">
        <!-- Cartas -->
        <div class="col-12 col-sm-6 col-md-3 mb-4 text-center">
            <a href="{{ url('/category/escritura-y-traduccion/cartas') }}" class="subcat-card">
                <img src="{{ asset('assets/img/front-pages/escrituraTraduccion/cartas.jpg') }}" class="img-fluid" alt="Logo">
                <h5 class="mt-2">Cartas</h5>
            </a>
        </div>

        <!-- Traducción -->
        <div class="col-12 col-sm-6 col-md-3 mb-4 text-center">
            <a href="{{ url('/category/escritura-y-traduccion/traducciones') }}" class="subcat-card">
                <img src="{{ asset('assets/img/front-pages/escrituraTraduccion/traducciones.jpg') }}" class="img-fluid" alt="Diseño de juegos">
                <h5 class="mt-2">Traducción</h5>
            </a>
        </div>

        <!-- Artículos y Blogs -->
        <div class="col-12 col-sm-6 col-md-3 mb-4 text-center">
            <a href="{{ url('/category/escritura-y-traduccion/articulosyblogs') }}" class="subcat-card">
                <img src="{{ asset('assets/img/front-pages/escrituraTraduccion/articulosyblogs.jpg') }}" class="img-fluid" alt="3D">
                <h5 class="mt-2">Artículos y Blogs</h5>
            </a>
        </div>

        <!-- Podcast -->
        <div class="col-12 col-sm-6 col-md-3 mb-4 text-center">
            <a href="{{ url('/category/escritura-y-traduccion/articulosyblogs') }}" class="subcat-card">
                <img src="{{ asset('assets/img/front-pages/escrituraTraduccion/podcast.jpg') }}" class="img-fluid" alt="Ilustraciones">
                <h5 class="mt-2">Libreto de podcast</h5>
            </a>
        </div>
    </div>

</div>
@endsection
