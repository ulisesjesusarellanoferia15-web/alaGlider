@extends('partials.master')
@section('content')

<div class="container py-5 text-center">

    <h1 class="text-success fw-bold mb-4">¡Pago completado! </h1>

    <p class="fs-5">Gracias por tu compra.</p>

    @if($payment)
        <p><strong>Método:</strong> {{ ucfirst($provider) }}</p>
        <p><strong>Monto:</strong> ${{ number_format($payment->amount, 2) }} MXN</p>
    @endif

    <a href="{{ url('/') }}" class="btn btn-success mt-3">Volver al inicio</a>

</div>

@endsection
