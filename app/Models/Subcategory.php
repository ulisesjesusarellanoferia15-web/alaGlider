<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; // 👈 importa Str para generar slugs

class Subcategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'id_categorie',
    ];

    public function flights()
    {
        return $this->hasMany(Flight::class, 'id_subcategorie');
    }

    // 🔥 Genera automáticamente el slug si está vacío
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($subcategory) {
            if (empty($subcategory->slug)) {
                $subcategory->slug = Str::slug($subcategory->name, '-');
            }
        });
    }
}




