@extends('partials.master')
@section('content')
@include('partials.menu')
{{-- Contenido principal --}}
<div class="container section-spacing mb-5">
    <h2 class="text-center mb-5">Música y Audio</h2>

    <div class="row justify-content-center">
        <!-- Producción de audio libros -->
        <div class="col-12 col-sm-6 col-md-3 mb-4 text-center">
            <a href="{{ url('/category/musica-y-audio/audiolibros') }}" class="subcat-card">
                <img src="{{ asset('assets/img/front-pages/musicayaudio/audiolibros.jpg') }}" class="img-fluid" alt="Logo">
                <h5 class="mt-2">Producción de audio libros</h5>
            </a>
        </div>

        <!-- Sesiones Musicales -->
        <div class="col-12 col-sm-6 col-md-3 mb-4 text-center">
            <a href="{{ url('/category/musica-y-audio/sesionesmusicales') }}" class="subcat-card">
                <img src="{{ asset('assets/img/front-pages/musicayaudio/sesiones.jpg') }}" class="img-fluid" alt="Diseño de juegos">
                <h5 class="mt-2">Sesiones Musicales</h5>
            </a>
        </div>

        <!-- Producciones y composiciones -->
        <div class="col-12 col-sm-6 col-md-3 mb-4 text-center">
            <a href="{{ url('/category/musica-y-audio/produccionesycomposiciones') }}" class="subcat-card">
                <img src="{{ asset('assets/img/front-pages/musicayaudio/producciones.jpg') }}" class="img-fluid" alt="Diseño de juegos">
                <h5 class="mt-2">Producciones y composiciones</h5>
            </a>
        </div>
    </div>

</div>
@endsection
