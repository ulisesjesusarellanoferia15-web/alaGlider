@extends('partials.master')
@section('content')
@include('partials.menu')
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
@endsection
