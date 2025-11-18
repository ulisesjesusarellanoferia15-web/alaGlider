@extends('partials.master')
@section('content')
@include('partials.menu')
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
@endsection
