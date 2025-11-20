<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;
use App\Models\FlightReview;
use Illuminate\Support\Str;

class FlightReviewController extends Controller
{
    public function store(Request $request, $flightId)
    {
        $flight = Flight::findOrFail($flightId);

        // Usuario debe estar logueado
        if (!auth()->check()) {
            return back()->with('error', 'Debes iniciar sesión para dejar una reseña.');
        }

        // Validar entrada
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:500',
        ]);

        FlightReview::create([
            'id' => Str::uuid(),
            'flight_id' => $flight->id,
            'user_id' => auth()->id(),
            'rating' => $validated['rating'],
            'comment' => $validated['comment'] ?? null,
        ]);

        return back()->with('success', '¡Gracias por tu reseña!');
    }
}


