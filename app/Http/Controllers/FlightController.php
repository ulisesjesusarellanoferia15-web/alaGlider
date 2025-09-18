<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// app/Http/Controllers/FlightController.php
namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function index()
    {
        // Traemos todos los vuelos con su freelancer
        $flights = Flight::with('freelancer')->get();

        return view('index', compact('flights'));
    }
}

