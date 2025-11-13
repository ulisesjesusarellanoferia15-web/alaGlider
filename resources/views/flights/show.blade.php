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

                @php
                $fly = $flight->packages->firstWhere('package_type', 'FLY');
                $tandem = $flight->packages->firstWhere('package_type', 'TANDEM');
                $master = $flight->packages->firstWhere('package_type', 'MASTER');
                @endphp

                <div class="tab-content" id="planTabsContent">
                    <!-- PLAN FLY -->
                    <div class="tab-pane fade show active" id="fly" role="tabpanel">
                        <strong class="fs-4 text-success d-block mb-2">
                            ${{ number_format($fly->cost ?? 0, 2) }} MXN
                        </strong>

                        <p class="text-muted small mb-3">
                            {{ strtoupper($flight->category->name ?? 'SERVICIO') }}
                        </p>

                        @if($fly)
                        <p class="small mb-2"><strong>Descripción:</strong> {{ $fly->description ?? 'Sin descripción' }}</p>
                        <p class="small mb-1"><i class="far fa-clock me-2"></i> {{ $fly->delivery_days ?? 0 }} días de entrega</p>
                        <p class="small mb-1"><i class="far fa-edit me-2"></i> {{ $fly->revisions ?? 0 }} revisiones</p>
                        <p class="small mb-1"><i class="far fa-image me-2"></i> {{ $fly->have_img ? 'Incluye imágenes' : 'Sin imágenes' }}</p>
                        <p class="small mb-1"><i class="fas fa-sync-alt me-2"></i> Revisiones extra: {{ $fly->extra_revitions ?? 0 }}</p>
                        <p class="small mb-3"><i class="fas fa-dollar-sign me-2"></i> Costo revisión extra: ${{ number_format($fly->cost_revitions ?? 0, 2) }}</p>
                        @else
                        <p class="text-muted small">No hay información del paquete Fly.</p>
                        @endif

                        <a href="#" class="btn btn-success w-100 mb-2"
                            style="background-color: #28c76f; border-color: #28c76f;">
                            Continuar ${{ number_format($fly->cost ?? 0, 2) }} MXN
                        </a>
                        <a href="#" class="btn btn-outline-secondary w-100">Contactar Vendedor</a>
                    </div>



                    <!-- PLAN TANDEM -->
                    <div class="tab-pane fade" id="tandem" role="tabpanel">
                        <strong class="fs-4 text-success d-block mb-2">
                            ${{ number_format($tandem->cost ?? 0, 2) }} MXN
                        </strong>

                        @if($tandem)
                        <p class="small mb-2"><strong>Descripción:</strong> {{ $tandem->description ?? 'Sin descripción' }}</p>
                        <p class="small mb-1"><i class="far fa-clock me-2"></i> {{ $tandem->delivery_days ?? 0 }} días de entrega</p>
                        <p class="small mb-1"><i class="far fa-edit me-2"></i> {{ $tandem->revisions ?? 0 }} revisiones</p>
                        <p class="small mb-1"><i class="far fa-image me-2"></i> {{ $tandem->have_img ? 'Incluye imágenes' : 'Sin imágenes' }}</p>
                        <p class="small mb-1"><i class="fas fa-sync-alt me-2"></i> Revisiones extra: {{ $tandem->extra_revitions ?? 0 }}</p>
                        <p class="small mb-3"><i class="fas fa-dollar-sign me-2"></i> Costo revisión extra: ${{ number_format($tandem->cost_revitions ?? 0, 2) }}</p>
                        @else
                        <p class="text-muted small">No hay información del paquete Tandem.</p>
                        @endif

                        <a href="#" class="btn btn-success w-100 mb-2"
                            style="background-color: #28c76f; border-color: #28c76f;">
                            Continuar ${{ number_format($tandem->cost ?? 0, 2) }} MXN
                        </a>
                        <a href="#" class="btn btn-outline-secondary w-100">Contactar Vendedor</a>
                    </div>



                    <!-- PLAN MASTER -->
                    <div class="tab-pane fade" id="master" role="tabpanel">
                        <strong class="fs-4 text-success d-block mb-2">
                            ${{ number_format($master->cost ?? 0, 2) }} MXN
                        </strong>

                        @if($master)
                        <p class="small mb-2"><strong>Descripción:</strong> {{ $master->description ?? 'Sin descripción' }}</p>
                        <p class="small mb-1"><i class="far fa-clock me-2"></i> {{ $master->delivery_days ?? 0 }} días de entrega</p>
                        <p class="small mb-1"><i class="far fa-edit me-2"></i> {{ $master->revisions ?? 0 }} revisiones</p>
                        <p class="small mb-1"><i class="far fa-image me-2"></i> {{ $master->have_img ? 'Incluye imágenes' : 'Sin imágenes' }}</p>
                        <p class="small mb-1"><i class="fas fa-sync-alt me-2"></i> Revisiones extra: {{ $master->extra_revitions ?? 0 }}</p>
                        <p class="small mb-3"><i class="fas fa-dollar-sign me-2"></i> Costo revisión extra: ${{ number_format($master->cost_revitions ?? 0, 2) }}</p>
                        @else
                        <p class="text-muted small">No hay información del paquete Master.</p>
                        @endif

                        <a href="#" class="btn btn-success w-100 mb-2"
                            style="background-color: #28c76f; border-color: #28c76f;">
                            Continuar ${{ number_format($master->cost ?? 0, 2) }} MXN
                        </a>
                        <a href="#" class="btn btn-outline-secondary w-100">Contactar Vendedor</a>
                    </div>


                </div>

            </div>
        </div>

    </div>

    <p class="text-muted">{{ $flight->description ?? 'Sin descripción disponible.' }}</p>
    <!-- 🟦 Tabla comparativa de paquetes -->
    @if($flight->packages && $flight->packages->count() > 0)
    <div class="mt-5">
        <h4 class="fw-bold mb-3">Compara paquetes</h4>

        <div class="table-responsive">
            <table class="table table-bordered align-middle text-center">
                <thead class="table-light">
                    <tr>
                        <th class="text-start">Paquete</th>
                        <th>FLY</th>
                        <th>TANDEM</th>
                        <th>MASTER</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $fly = $flight->packages->firstWhere('package_type', 'FLY');
                    $tandem = $flight->packages->firstWhere('package_type', 'TANDEM');
                    $master = $flight->packages->firstWhere('package_type', 'MASTER');
                    @endphp

                    <tr>
                        <td class="text-start"><strong>Multicompañía</strong></td>
                        <td>{{ $fly && $fly->characteristics && str_contains($fly->characteristics, 'multi') ? 'Sí' : 'No' }}</td>
                        <td>{{ $tandem && $tandem->characteristics && str_contains($tandem->characteristics, 'multi') ? 'Sí' : 'No' }}</td>
                        <td>{{ $master && $master->characteristics && str_contains($master->characteristics, 'multi') ? 'Sí' : 'No' }}</td>
                    </tr>

                    <tr>
                        <td class="text-start"><strong>Facturación Electrónica</strong></td>
                        <td>{{ $fly && $fly->have_url ? 'Sí' : 'No' }}</td>
                        <td>{{ $tandem && $tandem->have_url ? 'Sí' : 'No' }}</td>
                        <td>{{ $master && $master->have_url ? 'Sí' : 'No' }}</td>
                    </tr>

                    <tr>
                        <td class="text-start"><strong>Personalización</strong></td>
                        <td>{{ $fly && $fly->have_file ? 'Sí' : 'No' }}</td>
                        <td>{{ $tandem && $tandem->have_file ? 'Sí' : 'No' }}</td>
                        <td>{{ $master && $master->have_file ? 'Sí' : 'No' }}</td>
                    </tr>

                    <tr>
                        <td class="text-start"><strong>Revisiones</strong></td>
                        <td>{{ $fly->revisions ?? 0 }}</td>
                        <td>{{ $tandem->revisions ?? 0 }}</td>
                        <td>{{ $master->revisions ?? 0 }}</td>
                    </tr>

                    <tr>
                        <td class="text-start"><strong>Días de entrega</strong></td>
                        <td>{{ $fly->delivery_days ?? 0 }}</td>
                        <td>{{ $tandem->delivery_days ?? 0 }}</td>
                        <td>{{ $master->delivery_days ?? 0 }}</td>
                    </tr>

                    <tr class="fw-bold text-success">
                        <td class="text-start">Total</td>
                        <td>${{ number_format($fly->cost ?? 0, 2) }}</td>
                        <td>${{ number_format($tandem->cost ?? 0, 2) }}</td>
                        <td>${{ number_format($master->cost ?? 0, 2) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @endif


</div>

@endsection
