<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Subcategory;
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
    ];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'id_subcategorie');
    }

    public function freelancer()
    {
        return $this->belongsTo(User::class, 'id_freelancer');
    }
}



