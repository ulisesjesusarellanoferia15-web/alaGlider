<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.header')
</head>
@include('auth.login-modal')
@include('auth.register-modal')
@include('auth.verification-modal')

<body>
    <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
        <div class="layout-container">
            @include('partials.navbar')
            <!-- OFFCANVAS MENU SOLO PARA MÓVIL -->
            <div class="offcanvas offcanvas-start d-md-none" tabindex="-1" id="mobileMenu">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title">Menú</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                </div>

                <div class="offcanvas-body">
                    <ul class="list-unstyled">

                        <li class="mb-3">
                            <a href="#" class="btn btn-outline-secondary w-100">Moneda</a>
                        </li>

                        <li class="mb-3">
                            <a href="{{ url('/glider') }}" class="btn btn-outline-success w-100">Conviértete en Glider</a>
                        </li>

                        <li class="mb-3">
                            <button class="btn btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#loginModal">
                                Ingresar
                            </button>
                        </li>

                        <li>
                            <button class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#registerModal">
                                Únete
                            </button>
                        </li>

                    </ul>
                </div>
            </div>


            @yield('content')
        </div>
    </div>
    @include('partials.scripts')
    <div class="footer-wrapper" style="margin-top: 120px;">
        @include('partials.footer')
    </div>
    <!-- Modal "Sobre Nosotros" -->
    <div class="modal fade" id="aboutModal" tabindex="-1" aria-labelledby="aboutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold" id="aboutModalLabel">Sobre Nosotros</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body text-center p-4">
                    <img src="{{ asset('assets/img/illustrations/banner2.png') }}"
                        alt="AlaGlider"
                        class="img-fluid rounded-4 mb-3"
                        style="max-height: 250px;">
                    <p class="text-muted">
                        En <strong>AlaGlider</strong> conectamos freelancers con empresas de toda Latinoamérica, fomentando la colaboración
                        digital y el crecimiento económico mediante la creatividad y la innovación.
                    </p>
                </div>
                <div class="modal-footer border-0 justify-content-center">
                    <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @include('partials.scripts')
</body>

</html>
