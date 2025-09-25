<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <title>{{ ucfirst($subcategorySlug) }} - {{ $category->name }} | AlaGlider</title>
  <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">
</head>
<body>
  <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
    <div class="layout-container">

      {{-- Navbar --}}
      @include('partials.navbar')

      <div class="layout-page">
        <div class="content-wrapper">

            {{-- Menú dinámico de categorías --}}
                    <aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu flex-grow-0">
                        <div class="container-xxl d-flex h-100 justify-content-center align-items-center">
                            <ul class="menu-inner">
                                @foreach($categories as $category)
                                <li class="menu-item {{ $category->slug === 'diseno-grafico' ? 'active' : '' }}">
                                    <a href="{{ route('categories.show', $category->slug) }}" class="menu-link">
                                        {{ $category->name }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>

          <div class="container mt-5 mb-5 text-center">
            <h2>{{ ucfirst(str_replace('-', ' ', $subcategorySlug)) }}</h2>
            <p class="text-muted">
              Aquí pronto mostraremos contenido para <strong>{{ ucfirst(str_replace('-', ' ', $subcategorySlug)) }}</strong>
              dentro de la categoría <strong>{{ $category->name }}</strong>.
            </p>
          </div>

        </div>
      </div>

      @include('partials.footer')

    </div>
  </div>
</body>
</html>
