<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = ['name', 'description', 'image_url', 'id_categorie'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_categorie');
    }
}
