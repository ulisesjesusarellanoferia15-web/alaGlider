@extends('partials.master')

@section('content')
@include('partials.menu')

<div class="container my-5 glider-container">

    <!-- 🟢 1. Banner principal -->
    <div class="glider-section glider-banner">
        <img src="{{ asset('assets/img/alaglider/baner.png') }}" alt="Banner Glider">
    </div>

    <!-- 🟢 2. Título principal -->
    <div class="glider-section">
        <h2 class="fw-bold">¿Listo para iniciar como Glider?</h2>
    </div>

    <!-- 🟢 3. Video de YouTube -->
    <div class="glider-section glider-video">
        <iframe
            src="https://www.youtube.com/embed/fHWFI4iSNaw"
            title="Video Glider"
            allowfullscreen>
        </iframe>
    </div>

    <!-- 🟢 4. Texto motivacional -->
    <div class="glider-section">
        <h3 class="fw-semibold">Vende tus servicios de manera segura y fiable</h3>
    </div>

    <!-- 🟢 5. Imagen central con botón -->
    <div class="glider-section glider-main-image">
        <img src="{{ asset('assets/img/alaglider/rangos/piloto.png') }}" alt="Imagen Glider Principal">
        <div class="mt-4"> <!-- 🔹 botón un poco más abajo -->
            <a href="#" class="glider-btn">Continuar</a>
        </div>
    </div>

    <!-- 🟢 6. Subtítulo de insignias -->
    <div class="glider-section">
        <h3 class="fw-semibold">Sube de nivel y consigue tus nuevas insignias</h3>
    </div>

    <!-- 🟢 7. Imágenes horizontales de insignias -->
    <div class="glider-section glider-badges">
        <img src="{{ asset('assets/img/alaglider/rangos/teniente.png') }}" alt="Insignia 1">
        <img src="{{ asset('assets/img/alaglider/rangos/mayorDeAla.png') }}" alt="Insignia 2">
        <img src="{{ asset('assets/img/alaglider/rangos/alaMaster.png') }}" alt="Insignia 3">
    </div>

</div>

@endsection


