<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Subcategory extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['name', 'slug', 'description', 'id_categorie'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_categorie', 'id');
    }


    public function flights()
    {
        return $this->hasMany(Flight::class, 'id_subcategorie', 'id');
    }

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
