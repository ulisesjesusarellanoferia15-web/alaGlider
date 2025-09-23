<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;

class SubcategoryController extends Controller
{
    public function byCategory($id)
    {
        // Obtiene subcategorías por categoría
        $subcategories = Subcategory::where('id_categorie', $id)->get();

        return view('subcategories.carousel', compact('subcategories'));
    }
}
