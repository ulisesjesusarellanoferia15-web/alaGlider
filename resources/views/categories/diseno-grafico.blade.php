<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Navbar simple -->
    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a href="{{ url('/') }}" class="navbar-brand">AlaGlider</a>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container mt-5">
        <h1 class="mb-4">{{ $category->name }}</h1>
        <p>
            Aquí va el contenido especial de <strong>{{ $category->name }}</strong>.
            Más adelante lo mejoramos con un layout y diseño.
        </p>
    </div>

</body>
</html>


