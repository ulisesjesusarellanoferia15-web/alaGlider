@extends('partials.master')
@section('content')

<section class="container mt-5">
    <h2>{{ $subcategory->name }}</h2>
    <p>Pertenece a la categoría: <strong>{{ $category->name }}</strong></p>

    @if(count($flights) > 0)
        <ul>
            @foreach($flights as $flight)
                <li>{{ $flight->title }}</li>
            @endforeach
        </ul>
    @else
        <p>No hay productos aún.</p>
    @endif
</section>

@endsection
