@extends('partials.master')
@section('content')
@include('partials.menu')

<div class="container my-5 flight-detail">

    <div class="row">
        <!-- Columna izquierda -->
        <div class="col-lg-8">

            <h2 class="fw-bold mb-3">{{ $flight->name }}</h2>

            <!-- Información del freelancer -->
            <div class="d-flex align-items-center mb-3">
                @php
                    $user = optional($flight->freelancer)->user;
                @endphp
                <img src="{{ $user && $user->picture_profile ? asset('storage/' . $user->picture_profile) : asset('assets/img/avatars/1.png') }}"
                    class="rounded-circle border me-2" width="50" height="50" alt="Freelancer">

                <div>
                    <strong>{{ $user->name ?? 'Usuario' }}</strong><br>
                    <span class="text-muted small">{{ $flight->subcategory->name ?? 'Categoría' }}</span>
                </div>
                <div class="ms-auto text-center">
                    <img src="{{ asset('assets/img/alaglider/rangos/piloto.png') }}" width="40" alt="Rango">
                    <div class="text-warning small">⭐ 0</div>
                </div>
            </div>

            <!-- Imagen principal del vuelo -->
            <img src="{{ asset($flight->picture_url ?? 'assets/img/front-pages/default.png') }}"
                alt="{{ $flight->name }}" class="img-fluid rounded-4 shadow-sm mb-4">

            <!-- Descripción -->
            <h4 class="fw-semibold mb-3">Información sobre el servicio</h4>
            <p class="text-muted">{{ $flight->description ?? 'Sin descripción disponible.' }}</p>
        </div>

        <!-- Columna derecha -->
        <div class="col-lg-4">
            <div class="card shadow-sm border-0 p-3 sticky-top">
                <div class="mb-2">
                    <strong class="fs-4 text-success">${{ $flight->price ?? '30.00' }} MXN</strong>
                    <div class="text-muted small">{{ strtoupper($flight->category->name ?? 'SERVICIO') }}</div>
                </div>

                <hr>

                <p class="small mb-1"><i class="far fa-clock me-2"></i> 3 días de entrega</p>
                <p class="small mb-3"><i class="far fa-edit me-2"></i> 4 revisiones</p>

                <a href="#" class="btn btn-primary w-100 mb-2">Continuar ${{ $flight->price ?? '30.00' }} MXN</a>
                <a href="#" class="btn btn-outline-secondary w-100">Contactar Vendedor</a>
            </div>
        </div>
    </div>

</div>

@endsection
