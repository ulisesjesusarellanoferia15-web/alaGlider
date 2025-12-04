<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;
use App\Models\Payment;
use App\Models\PackagesProducts;
use Illuminate\Support\Facades\Auth;




// IMPORTACIONES DE PAYPAL
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Payer;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;



class CheckoutController extends Controller
{
    public function index($flightId, $packageId)
    {
        $flight = Flight::with('freelancer.user', 'category', 'subcategory', 'packages')->findOrFail($flightId);
        $package = PackagesProducts::findOrFail($packageId);

        return view('checkout.index', compact('flight','package'));
    }

    // ---------------- STRIPE ----------------
    public function stripe($packageId)
    {
        $package = PackagesProducts::findOrFail($packageId);
        $flight = Flight::find($package->id_flight ?? null);

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'mxn',
                    'product_data' => ['name' => 'Paquete ' . ($package->package_type ?? 'Paquete')],
                    'unit_amount' => intval(round($package->cost * 100)), // cents
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'metadata' => [
                'package_id' => $package->id,
                'flight_id' => $flight ? $flight->id : null,
                'user_id' => Auth::id(),
            ],
            'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('checkout.cancel'),
        ]);

        // Guardar payment provisional
        $p = Payment::create([
            'flight_id' => $flight ? $flight->id : null,
            'package_id' => $package->id,
            'user_id' => Auth::id(),
            'provider' => 'stripe',
            'provider_payment_id' => $session->id,
            'amount' => $package->cost,
            'currency' => 'MXN',
            'status' => 'pending',
            'meta' => ['checkout_url' => $session->url ?? null],
        ]);

        return redirect($session->url);
    }

    // ---------------- MERCADOPAGO ----------------
    public function mercadopago($packageId)
    {
        $package = PackagesProducts::findOrFail($packageId);
        $flight = Flight::find($package->id_flight ?? null);

        \MercadoPago\SDK::setAccessToken(env('MERCADOPAGO_ACCESS_TOKEN'));

        $preference = new \MercadoPago\Preference();

        $item = new \MercadoPago\Item();
        $item->title = 'Paquete ' . ($package->package_type ?? 'Paquete');
        $item->quantity = 1;
        $item->unit_price = (float)$package->cost;

        $preference->items = [$item];
        $preference->back_urls = [
            "success" => route('checkout.success'),
            "failure" => route('checkout.cancel'),
            "pending" => route('checkout.cancel'),
        ];
        $preference->auto_return = "approved";
        $preference->save();

        $p = Payment::create([
            'flight_id' => $flight ? $flight->id : null,
            'package_id' => $package->id,
            'user_id' => Auth::id(),
            'provider' => 'mercadopago',
            'provider_payment_id' => $preference->id,
            'amount' => $package->cost,
            'currency' => 'MXN',
            'status' => 'pending',
            'meta' => ['init_point' => $preference->init_point ?? null],
        ]);

        return redirect($preference->init_point);
    }

    // ---------------- PAYPAL ----------------
    public function paypal($packageId)
    {
        $package = PackagesProducts::findOrFail($packageId);
        $flight = Flight::find($package->id_flight ?? null);

        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(env('PAYPAL_CLIENT_ID'), env('PAYPAL_SECRET'))
        );

        $apiContext->setConfig(['mode' => env('PAYPAL_MODE', 'sandbox')]);

        $payer = new \PayPal\Api\Payer();
        $payer->setPaymentMethod("paypal");

        $amount = new \PayPal\Api\Amount();
        $amount->setCurrency("MXN")->setTotal(number_format($package->cost, 2, '.', ''));

        $transaction = new \PayPal\Api\Transaction();
        $transaction->setAmount($amount)->setDescription("Paquete " . ($package->package_type ?? ''));

        $redirectUrls = new \PayPal\Api\RedirectUrls();
        $redirectUrls->setReturnUrl(route('checkout.success'))->setCancelUrl(route('checkout.cancel'));

        $payment = new \PayPal\Api\Payment();
        $payment->setIntent("sale")
                ->setPayer($payer)
                ->setTransactions([$transaction])
                ->setRedirectUrls($redirectUrls);

        try {
            $payment->create($apiContext);

            $p = Payment::create([
                'flight_id' => $flight ? $flight->id : null,
                'package_id' => $package->id,
                'user_id' => Auth::id(),
                'provider' => 'paypal',
                'provider_payment_id' => $payment->getId(),
                'amount' => $package->cost,
                'currency' => 'MXN',
                'status' => 'pending',
                'meta' => ['approval_url' => $payment->getApprovalLink()],
            ]);

            return redirect($payment->getApprovalLink());

        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    // ---------------- SUCCESS y CANCEL ----------------
    public function success(Request $request)
    {
        // Manejo stripe:
        if ($request->has('session_id')) {
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $sessionId = $request->get('session_id');
            $session = \Stripe\Checkout\Session::retrieve($sessionId);

            $payment = Payment::where('provider', 'stripe')->where('provider_payment_id', $sessionId)->first();
            if ($session->payment_status === 'paid') {
                if ($payment) {
                    $payment->status = 'paid';
                    $payment->meta = array_merge($payment->meta ?? [], ['stripe_session' => $session->toArray()]);
                    $payment->save();
                }
            }

            // redirige a una vista de éxito
            return view('checkout.success', ['payment' => $payment ?? null, 'provider' => 'stripe']);
        }


        return view('checkout.success', ['payment' => null, 'provider' => 'other']);
    }

    public function cancel(Request $request)
    {
        return view('checkout.cancel');
    }
}

