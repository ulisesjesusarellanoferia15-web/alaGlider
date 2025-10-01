@extends('partials.master')
@section('content')
<section class="align-content-center mt-4">
    <div class="container">
        <h2 class="text-bold text-center mb-4">{{ $category->name }} - {{ $subcategory->name }}</h2>

        <div class="row">
            @forelse($flights as $flight)
                <div class="col-md-4 mb-4">
                    <div class="ag-card">
                        {{-- Carrusel (ejemplo: una sola imagen del vuelo) --}}
                        <div id="flightCarousel{{ $flight->id }}" class="carousel slide carousel-fade" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100 rounded-top ag-card-image"
                                         src="{{ asset($flight->picture_url ?? 'assets/img/front-pages/default.jpg') }}"
                                         alt="{{ $flight->name }}">
                                </div>
                            </div>
                        </div>

                        {{-- Info del card --}}
                        <div class="ag-card-body">
                            <div class="d-flex align-items-center mb-2">
                                <img class="rounded-circle border me-2" width="32" height="32"
                                     src="{{ asset('assets/img/avatars/1.png') }}" alt="Freelancer">
                                <span class="fw-bold">{{ $flight->freelancer->name ?? 'Freelancer' }}</span>
                            </div>
                            <h5 class="mb-2">{{ $flight->name }}</h5>
                            <p class="mb-2 text-muted">{{ $flight->description }}</p>

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
            @empty
                <p class="text-center">No hay productos disponibles en esta subcategoría.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection
