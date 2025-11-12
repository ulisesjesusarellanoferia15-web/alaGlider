@extends('partials.master')
@section('content')
@include('partials.menu')

<div class="container my-5 flight-detail">

    <div class="row">
        <!-- Columna izquierda -->
        <div class="col-lg-8">

            <h2 class="fw-bold mb-3">{{ $flight->name }}</h2>

            <!-- Header del freelancer -->
            <div class="d-flex align-items-center mb-3 freelancer-header">

                <!-- foto, nombre, categoría -->
                <div class="d-flex align-items-center">
                    <img src="{{ asset('storage/' . ltrim($flight->freelancer->user->picture_profile ?? 'assets/img/avatars/1.png', '/')) }}"
                        alt="{{ $flight->freelancer->user->name ?? 'Usuario' }}"
                        class="freelancer-avatar rounded-circle me-3">

                    <div>
                        <h6 class="fw-bold mb-0">{{ $flight->freelancer->user->name ?? 'Usuario' }}</h6>
                        <small class="text-muted">{{ $flight->subcategory->name ?? 'Categoría' }}</small>
                    </div>

                    <!-- Insignia -->
                    <div class="d-flex align-items-center ms-3 freelancer-stats text-muted">
                        <img src="{{ asset('assets/img/alaglider/rangos/piloto.png') }}" alt="Piloto" class="freelancer-rank me-2">

                        <div class="d-flex align-items-center me-3">
                            <i class="fas fa-plane me-1 text-primary"></i>
                            <small>0</small>
                        </div>

                        <div class="d-flex align-items-center me-3">
                            <i class="fas fa-box me-1 text-warning"></i>
                            <small>5 paquetes en fila</small>
                        </div>

                        <div class="d-flex align-items-center">
                            <i class="fas fa-clock me-1 text-success"></i>
                            <small>10 días de espera</small>
                        </div>
                    </div>
                </div>

            </div>





            <!-- Imagen principal del vuelo -->
            <img src="{{ asset($flight->picture_url ?? 'assets/img/front-pages/default.png') }}"
                alt="{{ $flight->name }}" class="img-fluid rounded-4 shadow-sm mb-4" style="max-width: 60%;">

            <!-- Descripción -->
            <h4 class="fw-semibold mb-3">Información sobre el servicio</h4>
            <p class="text-muted">{{ $flight->description ?? 'Sin descripción disponible.' }}</p>
        </div>

        <!-- Columna derecha -->
        <div class="col-lg-4">
            <div class="card shadow-sm border-0 p-4 sticky-top">

                <!-- Pestañas de planes -->
                <ul class="nav nav-tabs justify-content-between mb-3" id="planTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="fly-tab" data-bs-toggle="tab" data-bs-target="#fly" type="button" role="tab">FLY</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="tandem-tab" data-bs-toggle="tab" data-bs-target="#tandem" type="button" role="tab">TANDEM</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="master-tab" data-bs-toggle="tab" data-bs-target="#master" type="button" role="tab">MASTER</button>
                    </li>
                </ul>

                <div class="tab-content" id="planTabsContent">
                    <!-- PLAN FLY -->
                    <div class="tab-pane fade show active" id="fly" role="tabpanel">
                        <strong class="fs-4 text-success d-block mb-2">${{ $flight->price ?? '30.00' }} MXN</strong>
                        <p class="text-muted small mb-3">{{ strtoupper($flight->category->name ?? 'SERVICIO') }}</p>
                        <p class="small mb-1"><i class="far fa-clock me-2"></i> 3 días de entrega</p>
                        <p class="small mb-3"><i class="far fa-edit me-2"></i> 4 revisiones</p>
                        <p class="small mb-3"><i class="fas fa-check-circle text-success me-2"></i> Personalización</p>
                        <a href="#" class="btn btn-success w-100 mb-2" style="background-color: #28c76f; border-color: #28c76f;">
                            Continuar ${{ $flight->price ?? '30.00' }} MXN
                        </a>
                        <a href="#" class="btn btn-outline-secondary w-100">Contactar Vendedor</a>
                    </div>

                    <!-- PLAN TANDEM -->
                    <div class="tab-pane fade" id="tandem" role="tabpanel">
                        <strong class="fs-4 text-success d-block mb-2">${{ $flight->price ? $flight->price + 20 : '50.00' }} MXN</strong>
                        <p class="text-muted small mb-3">Incluye características adicionales.</p>
                        <p class="small mb-1"><i class="far fa-clock me-2"></i> 5 días de entrega</p>
                        <p class="small mb-3"><i class="far fa-edit me-2"></i> 6 revisiones</p>
                        <p class="small mb-3"><i class="fas fa-check-circle text-success me-2"></i> Personalización avanzada</p>
                        <a href="#" class="btn btn-success w-100 mb-2" style="background-color: #28c76f; border-color: #28c76f;">
                            Continuar ${{ $flight->price ? $flight->price + 20 : '50.00' }} MXN
                        </a>
                        <a href="#" class="btn btn-outline-secondary w-100">Contactar Vendedor</a>
                    </div>

                    <!-- PLAN MASTER -->
                    <div class="tab-pane fade" id="master" role="tabpanel">
                        <strong class="fs-4 text-success d-block mb-2">${{ $flight->price ? $flight->price + 50 : '80.00' }} MXN</strong>
                        <p class="text-muted small mb-3">Plan completo con soporte premium.</p>
                        <p class="small mb-1"><i class="far fa-clock me-2"></i> 7 días de entrega</p>
                        <p class="small mb-3"><i class="far fa-edit me-2"></i> Revisiones ilimitadas</p>
                        <p class="small mb-3"><i class="fas fa-check-circle text-success me-2"></i> Soporte prioritario</p>
                        <a href="#" class="btn btn-success w-100 mb-2" style="background-color: #28c76f; border-color: #28c76f;">
                            Continuar ${{ $flight->price ? $flight->price + 50 : '80.00' }} MXN
                        </a>
                        <a href="#" class="btn btn-outline-secondary w-100">Contactar Vendedor</a>
                    </div>
                </div>

            </div>
        </div>

    </div>

</div>

@endsection
