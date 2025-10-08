<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function index()
    {
        // Traemos todas las categorías con sus subcategorías y vuelos activos (máx. 6 por categoría)
        $categories = Category::with(['subcategories.flights' => function ($query) {
            $query->where('active', true)
                  ->with('freelancer')
                  ->inRandomOrder()
                  ->take(6);
        }])->get();


        // ✅ Vuelos aleatorios globales (para “Servicios que te pueden interesar”)
    $recommendedFlights = \App\Models\Flight::with('freelancer')
        ->where('active', true)
        ->inRandomOrder()
        ->take(6)
        ->get();

        return view('index', compact('categories', 'recommendedFlights'));
    }
}
