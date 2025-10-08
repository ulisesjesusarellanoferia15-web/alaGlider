<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['name', 'slug', 'description'];

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class, 'id_categorie', 'id');
    }

    // Relación: una categoría puede tener muchos vuelos directamente
    public function flights()
    {
        return $this->hasMany(Flight::class, 'id_categorie', 'id');
    }

    // 🔥 Genera automáticamente el slug si está vacío
    protected static function booted()
    {
        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }

            // Si usas UUIDs en vez de auto_increment:
            if (empty($category->id)) {
                $category->id = (string) \Illuminate\Support\Str::uuid();
            }
        });

        static::updating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });
    }
}
