@extends('partials.master')
@section('content')
@include('partials.menu')
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
            <a href="{{ url('/category/programacion-y-desarrollo/appmovil') }}" class="subcat-card">
                <img src="{{ asset('assets/img/front-pages/programacionydesarrollo/appmovil.jpg') }}" class="img-fluid" alt="Diseño de juegos">
                <h5 class="mt-2">Aplicaciones Moviles</h5>
            </a>
        </div>

        <!-- Ciberseguridad y protección de datos -->
        <div class="col-12 col-sm-6 col-md-3 mb-4 text-center">
            <a href="{{ url('/category/programacion-y-desarrollo/ciberseguridad') }}" class="subcat-card">
                <img src="{{ asset('assets/img/front-pages/programacionydesarrollo/ciberseguridad.jpg') }}" class="img-fluid" alt="Diseño de juegos">
                <h5 class="mt-2">Ciberseguridad y protección de datos</h5>
            </a>
        </div>

        <!-- Bases de Datos -->
        <div class="col-12 col-sm-6 col-md-3 mb-4 text-center">
            <a href="{{ url('/category/programacion-y-desarrollo/db') }}" class="subcat-card">
                <img src="{{ asset('assets/img/front-pages/programacionydesarrollo/db.jpg') }}" class="img-fluid" alt="Diseño de juegos">
                <h5 class="mt-2">Bases de Datos</h5>
            </a>
        </div>

        <!-- Soporte Técnico -->
        <div class="col-12 col-sm-6 col-md-3 mb-4 text-center">
            <a href="{{ url('/category/programacion-y-desarrollo/st') }}" class="subcat-card">
                <img src="{{ asset('assets/img/front-pages/programacionydesarrollo/st.jpg') }}" class="img-fluid" alt="Diseño de juegos">
                <h5 class="mt-2">Soporte Técnico</h5>
            </a>
        </div>

        <!-- WordPress -->
        <div class="col-12 col-sm-6 col-md-3 mb-4 text-center">
            <a href="{{ url('/category/programacion-y-desarrollo/wordpress') }}" class="subcat-card">
                <img src="{{ asset('assets/img/front-pages/programacionydesarrollo/wordpress.jpg') }}" class="img-fluid" alt="Diseño de juegos">
                <h5 class="mt-2">WordPress</h5>
            </a>
        </div>
    </div>

</div>
@endsection
