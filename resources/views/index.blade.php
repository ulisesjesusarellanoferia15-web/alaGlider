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

                <div id="cardsCarousel" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-inner">

                    @php
                      $chunks = $flights->chunk(3); // 3 tarjetas por fila
                    @endphp

                    @foreach($chunks as $chunkIndex => $chunk)
                      <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">
                        <div class="row justify-content-center">

                          @foreach($chunk as $flight)
                            <div class="col-md-4">
                              <div class="card mb-3">
                                <img src="https://via.placeholder.com/300x180" class="card-img-top" alt="{{ $flight->name }}">
                                <div class="card-body">
                                  <h5 class="card-title">{{ $flight->name }}</h5>
                                  <p class="card-text">{{ Str::limit($flight->description, 100) }}</p>
                                  <div class="d-flex align-items-center mt-3">
                                    <img src="https://via.placeholder.com/40" class="rounded-circle me-2" alt="Perfil">
                                    <span>Freelancer #{{ $flight->id_freelancer }}</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          @endforeach

                        </div>
                      </div>
                    @endforeach

                  </div>

                  <!-- Controles -->
                  <button class="carousel-control-prev" type="button" data-bs-target="#cardsCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bg-dark rounded-circle" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#cardsCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon bg-dark rounded-circle" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                  </button>
                </div>




              </div>
            </div>
            <!--/ Content -->
@endsection
           