@extends('partials.master')
@section('content')
@include('partials.menu')

<div class="container my-5 section-categorias">

    <!-- Título de la subcategoría -->
    <h2 class="fw-bold mb-4 text-center">{{ $subcategory->name }}</h2>


    @if($flights->count() > 0)

    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">

        @foreach($flights as $flight)
            @php
                $user = optional($flight->freelancer)->user;
                $price = $flight->packages->first()->cost ?? '0.00';
            @endphp

            <div class="col">
                <div class="card shadow-sm border-0 rounded-4 overflow-hidden h-100">

                    <!-- Imagen principal -->
                    <img src="{{ asset($flight->picture_url ?? 'assets/img/front-pages/default.png') }}"
                        class="card-img-top"
                        alt="{{ $flight->name }}">

                    <div class="card-body">

                        <!-- Avatar + Nombre -->
                        <div class="d-flex align-items-center mb-2">

                            @if($user && $user->picture_profile)
                                <img src="{{ asset('storage/' . ltrim($user->picture_profile, '/')) }}"
                                    width="32" height="32"
                                    class="rounded-circle border me-2"
                                    alt="{{ $user->name }}">
                            @else
                                <img src="{{ asset('assets/img/avatars/1.png') }}"
                                    width="32" height="32"
                                    class="rounded-circle border me-2"
                                    alt="Usuario">
                            @endif

                            <span class="fw-bold">
                                {{ $user->name ?? 'Usuario' }}
                            </span>
                        </div>

                        <!-- Título -->
                        <h6 class="fw-bold mb-1">{{ $flight->name }}</h6>

                        <!-- Descripción -->
                        <p class="text-muted small mb-2">
                            {{ Str::limit($flight->description, 100, '...') }}
                        </p>

                        <!-- Footer -->
                        <div class="d-flex justify-content-between align-items-center mt-auto">
                            <span class="text-success fw-bold">
                                Desde ${{ $price }}
                            </span>

                            <a href="{{ route('flights.show', $flight->id) }}"
                                class="btn btn-outline-primary btn-sm rounded-pill">
                                Ver vuelo
                            </a>
                        </div>

                    </div>

                </div>
            </div>

        @endforeach

    </div>

    @else

        <div class="alert alert-light text-muted shadow-sm border rounded-3 text-center p-4">
            <i class="fas fa-info-circle me-2"></i>
            No hay vuelos disponibles en esta subcategoría.
        </div>

    @endif

</div>

@endsection

