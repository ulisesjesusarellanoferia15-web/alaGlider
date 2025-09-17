<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        // Cargar todas las categorías para mostrarlas en el index
        $categories = Category::orderBy('name')->get();
        return view('index', compact('categories'));
    }

    public function show($slug)
{
    // Buscar categoría por slug
    $category = Category::where('slug', $slug)->firstOrFail();

    //"Diseño Gráfico"
    if ($category->slug === 'diseno-grafico') {
        return view('categories.diseno-grafico', compact('category'));
    }

    //"Estructura y Traducción", otra vista especial
    if ($category->slug === 'estructura-y-traduccion') {
        return view('categories.estructura-traduccion', compact('category'));
    }

    //Todas las demás usan la genérica
    return view('categories.show', compact('category'));
}

}

