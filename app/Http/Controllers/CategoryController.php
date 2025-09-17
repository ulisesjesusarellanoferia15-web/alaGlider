<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        // Obtener todas las categorías
        $categories = Category::all();

        // Pasarlas a la vista
        return view('index', compact('categories'));
    }

    public function showCategory($id)
{
    $category = Category::where('id', $id)->firstOrFail();

    // Aquí puedes pasar los productos o contenido relacionado
    return view('category', compact('category'));
}
}
