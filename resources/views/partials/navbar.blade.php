@php
use Illuminate\Support\Str;
@endphp

<!-- Navbar -->
<nav class="layout-navbar navbar navbar-expand-xl align-items-center" id="layout-navbar">
    <div class="container-xxl">

        <!-- 🔵 HAMBURGUESA SOLO MÓVIL (IZQUIERDA) -->
        <div class="d-flex d-md-none align-items-center">
            <button class="btn p-0 me-2"
                type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#mobileMenu">
                <i class="icon-base ti tabler-menu-2 icon-md"></i>
            </button>

            <!-- LOGO MÓVIL CENTRADO -->
            <a href="{{ url('/') }}" class="mx-auto">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" width="120rem">
            </a>
        </div>


        <!-- 🔵 LOGO ESCRITORIO (NO SE TOCÓ NADA) -->
        <div class="navbar-brand app-brand demo d-none d-md-flex py-0 me-4 ms-0">
            <a href="{{ url('/') }}" class="app-brand-link">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" width="150rem">
            </a>
        </div>


        <!-- 🔵 MENÚ DE ESCRITORIO (NO SE TOCÓ NADA) -->
        <div class="navbar-nav-right d-none d-md-flex align-items-center justify-content-end ms-auto" id="navbar-collapse">
            <ul class="navbar-nav flex-row align-items-center ms-md-auto">

                {{-- ============================
                    USUARIOS NO AUTENTICADOS
                ============================= --}}
                @guest
                <li class="nav-item dropdown me-3">
                    <a class="nav-link dropdown-toggle btn btn-outline-secondary rounded-pill px-3" href="#" data-bs-toggle="dropdown">
                        $ Moneda
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">USD</a></li>
                        <li><a class="dropdown-item" href="#">MXN</a></li>
                        <li><a class="dropdown-item" href="#">COL</a></li>
                    </ul>
                </li>

                <li class="nav-item me-2">
                    <a href="javascript:void(0);" class="btn btn-outline-ingresar rounded-pill px-3">Conviértete en Glider</a>
                </li>

                <li class="nav-item me-2">
                    <button type="button" class="btn btn-outline-ingresar rounded-pill px-3"
                        data-bs-toggle="modal" data-bs-target="#loginModal">
                        Ingresar
                    </button>
                </li>

                <li class="nav-item">
                    <button type="button" class="btn btn-unete rounded-pill px-3"
                        data-bs-toggle="modal" data-bs-target="#registerModal">
                        Únete
                    </button>
                </li>
                @endguest

                {{-- ============================
                    USUARIOS AUTENTICADOS
                ============================= --}}
                @auth
                <li class="nav-item dropdown me-3">
                    <span class="nav-link btn btn-outline-secondary rounded-pill px-3 position-relative">
                        <i class="icon-base ti tabler-shopping-cart icon-md"></i>
                    </span>
                </li>

                <li class="nav-item dropdown me-3">
                    <a class="nav-link dropdown-toggle btn btn-outline-secondary rounded-pill px-3"
                        href="#" data-bs-toggle="dropdown">
                        Moneda: USD
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">USD</a></li>
                        <li><a class="dropdown-item" href="#">MXN</a></li>
                        <li><a class="dropdown-item" href="#">COL</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown me-3 position-relative">
                    <a class="nav-link dropdown-toggle btn btn-outline-secondary rounded-pill px-3"
                        href="#" data-bs-toggle="dropdown">
                        <i class="icon-base ti tabler-bell icon-md"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning"
                            style="font-size: 0.6rem;">!</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><span class="dropdown-item-text">Sin notificaciones</span></li>
                    </ul>
                </li>

                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow p-0" href="#" data-bs-toggle="dropdown">
                        <div class="avatar avatar-online">
                            <img
                                src="{{ optional(Auth::user()->user)->picture_profile
                                ? (Str::startsWith(optional(Auth::user()->user)->picture_profile, ['http://', 'https://'])
                                    ? optional(Auth::user()->user)->picture_profile
                                    : asset('storage/' . optional(Auth::user()->user)->picture_profile))
                                : asset('assets/img/avatars/1.png') }}"
                                class="rounded-circle" width="40" height="40">
                        </div>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end">

                        <li><a class="dropdown-item mt-0" href="#">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-2">
                                    <div class="avatar avatar-online">
                                        <img
                                            src="{{ optional(Auth::user()->user)->picture_profile
                                            ? (Str::startsWith(optional(Auth::user()->user)->picture_profile, ['http://', 'https://'])
                                                ? optional(Auth::user()->user)->picture_profile
                                                : asset('storage/' . optional(Auth::user()->user)->picture_profile))
                                            : asset('assets/img/avatars/1.png') }}"
                                            class="rounded-circle" width="40" height="40">
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0">{{ optional(Auth::user()->user)->name ?? 'Sin Nombre' }}</h6>
                                    <small class="text-body-secondary">
                                        {{ optional(optional(Auth::user()->user)->profile)->name ?? 'Sin Rol' }}
                                    </small>
                                </div>
                            </div>
                        </a></li>

                        <li><div class="dropdown-divider my-1 mx-n2"></div></li>

                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">
                            <i class="icon-base ti tabler-user me-3 icon-md"></i> Editar Perfil
                        </a></li>

                        <li><a class="dropdown-item" href="{{ route('registro.glider') }}">
                            <i class="icon-base ti tabler-rocket me-3 icon-md"></i> Conviértete en Glider
                        </a></li>

                        <li><a class="dropdown-item" href="#">
                            <i class="icon-base ti tabler-settings me-3 icon-md"></i> Configuración
                        </a></li>

                        <li><div class="dropdown-divider my-1 mx-n2"></div></li>

                        <li>
                            <div class="d-grid px-2 pt-2 pb-1">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger d-flex w-100">
                                        <small>Cerrar sesión</small>
                                        <i class="icon-base ti tabler-logout ms-2 icon-14px"></i>
                                    </button>
                                </form>
                            </div>
                        </li>

                    </ul>
                </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>


