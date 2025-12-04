@extends('partials.master')
@section('content')

<div class="container py-5 text-center">

    <h1 class="text-danger fw-bold mb-4">Pago cancelado</h1>

    <p class="fs-5">Parece que no completaste el pago.</p>

    <a href="{{ url('/') }}" class="btn btn-secondary mt-3">Volver al inicio</a>

</div>

@endsection
