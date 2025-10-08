<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\User;

class Flight extends Model
{
    protected $fillable = [
        'name',
        'description',
        'type_logo',
        'active',
        'is_pay',
        'id_freelancer',
        'id_categorie',
        'id_subcategorie',
        'picture_url',
    ];

    protected $keyType = 'string';
    public $incrementing = false;

    // Relación: pertenece a una subcategoría
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'id_subcategorie');
    }

    // Relación: pertenece a una categoría
    public function category()
    {
        return $this->belongsTo(Category::class, 'id_categorie');
    }

    // Relación: pertenece a un freelancer (usuario)
    public function freelancer()
    {
        return $this->belongsTo(User::class, 'id_freelancer');
    }
}
