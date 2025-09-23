@extends('partials.master')
@section('content')


<div id="subcategoriesCarousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">

    @php
      $chunks = $subcategories->chunk(3); // 3 tarjetas por fila
    @endphp

    @foreach($chunks as $chunkIndex => $chunk)
      <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">
        <div class="row justify-content-center">

          @foreach($chunk as $sub)
            <div class="col-md-4">
              <div class="card mb-3">
                <img src="{{ $sub->image_url ?? 'https://via.placeholder.com/300x180' }}" 
                     class="card-img-top" alt="{{ $sub->name }}">
                <div class="card-body">
                  <h5 class="card-title">{{ $sub->name }}</h5>
                  <p class="card-text">{{ Str::limit($sub->description, 100) }}</p>
                </div>
              </div>
            </div>
          @endforeach

        </div>
      </div>
    @endforeach

  </div>

  <!-- Controles -->
  <button class="carousel-control-prev" type="button" data-bs-target="#subcategoriesCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon bg-dark rounded-circle" aria-hidden="true"></span>
    <span class="visually-hidden">Anterior</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#subcategoriesCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon bg-dark rounded-circle" aria-hidden="true"></span>
    <span class="visually-hidden">Siguiente</span>
  </button>
</div>
@endsection