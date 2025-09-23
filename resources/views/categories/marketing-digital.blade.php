<!doctype html>
<html lang="es" class="layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr">
<head>
  <meta charset="utf-8" />
  <title>Diseño Gráfico - AlaGlider</title>
  <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
</head>
<body>
  <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
    <div class="layout-container">

      {{-- Navbar (copiado igual que en index.blade.php) --}}
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
          <br>

          {{-- Contenido principal --}}
          <div class="container text-center py-5">
                <h2 class="mb-4">{{ $category->name }}</h2>
                <p class="text-muted">🚧 Esta sección está en construcción.<br>Pronto trabajaremos en una vista mejor.</p>
            </div>


        </div>

      </div>
        @include('partials.footer')


    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
