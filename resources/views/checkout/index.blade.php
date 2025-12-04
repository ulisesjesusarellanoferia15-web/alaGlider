@extends('partials.master')
@section('content')

<div class="container py-5">

    <h2 class="fw-bold mb-4">Finalizar compra</h2>

    <div class="card shadow-sm p-4">

        <h4 class="fw-bold">{{ $package->package_type }} – ${{ number_format($package->cost, 2) }} MXN</h4>
        <p class="text-muted">{{ $flight->name }}</p>

        <hr>

        <h5 class="fw-semibold mb-3">Selecciona un método de pago</h5>

        <div class="d-grid gap-3">

            <a href="{{ route('checkout.stripe', $package->id) }}" class="btn btn-dark">
                Pagar con Stripe (Tarjeta)
            </a>

            <a href="{{ route('checkout.mercadopago', $package->id) }}" class="btn btn-primary">
                Pagar con Mercado Pago
            </a>

            <a href="{{ route('checkout.paypal', $package->id) }}" class="btn btn-warning">
                Pagar con PayPal
            </a>

        </div>

    </div>

</div>

@endsection
