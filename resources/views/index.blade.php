@extends('partials.master')
@section('content')

<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row g-6">
    <!-- Website Analytics -->
    <div class="col-xl-12 col" style="height: 400px;">
      <div
        class="swiper-container swiper-container-horizontal swiper swiper-card-advance-bg"
        id="swiper-with-pagination-cards" style="height: 400px;">

        <div class="swiper-wrapper">

          <!-- Slide 1 -->
          <div class="swiper-slide slide-bg" style="background-image: url('../../assets/img/illustrations/banner1.png');">
            <div class="row h-100 d-flex align-items-center text-center">
              <div class="col-12">
                <h1 class="text-white mb-3">AlaGlider</h1>
                <h4 class="text-white">Te conectamos con freelancers de habla hispana para potenciar tu negocio</h4>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="swiper-slide slide-bg" style="background-image: url('../../assets/img/illustrations/banner2.png');">
            <div class="row h-100 d-flex align-items-center text-center">
              <div class="col-12">
                <h1 class="text-white mb-3">¿Qué es AlaGlider?</h1>
                <h4 class="text-white">Somos el primer marketplace de contenido digital on demand en español para Latinoamérica</h4>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="swiper-slide slide-bg" style="background-image: url('../../assets/img/illustrations/banner3.png');">
            <div class="row h-100 d-flex align-items-center text-center">
              <div class="col-12">
                <h1 class="text-white mb-3">Nuestra Misión</h1>
                <h4 class="text-white">Conectar negocios entre empresas de América latina y freelancers de todo el mundo,<br>creando riqueza y valor a través del contenido digital.</h4>
              </div>
            </div>
          </div>

        </div>

        <!-- Paginación -->
        <div class="swiper-pagination"></div>
      </div>
    </div>
    <!--/ Website Analytics -->

    <!--/ Carrusel de trajetas  -->

    <<!-- Carrusel de tarjetas -->
      <div class="container-xxl flex-grow-1 container-p-y">
    <h2>Vuelos y Perfiles</h2>

    {{-- Aquí pega el código del carrusel --}}
    @php
        // Carpeta de vuelos
        $flightsFolder = storage_path('app/public/package/flights');
        $flightImages = is_dir($flightsFolder) ? scandir($flightsFolder) : [];

        // Carpeta de perfiles
        $profilesFolder = storage_path('app/public/profiles');
        $profileImages = is_dir($profilesFolder) ? scandir($profilesFolder) : [];

        // Filtramos solo archivos jpg/png
        $flightImages = array_filter($flightImages, fn($file) => preg_match('/\.(jpg|jpeg|png|gif)$/i', $file));
        $profileImages = array_filter($profileImages, fn($file) => preg_match('/\.(jpg|jpeg|png|gif)$/i', $file));
    @endphp

    <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($flightImages as $index => $flightImage)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    {{-- Imagen del vuelo --}}
                    <img src="{{ asset('storage/package/flights/' . $flightImage) }}" class="d-block w-100" alt="Vuelo">

                    <div class="carousel-caption d-none d-md-block">
                        {{-- Imagen de perfil correspondiente --}}
                        @php
                            $profileImage = $profileImages[$index % count($profileImages)] ?? null;
                        @endphp
                        @if($profileImage)
                            <img src="{{ asset('storage/profiles/' . $profileImage) }}" 
                                 alt="Perfil" class="rounded-circle" width="50" height="50">
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>
</div>

      <!--/ Content -->
      @endsection