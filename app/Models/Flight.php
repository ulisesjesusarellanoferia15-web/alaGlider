<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/Flight.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $fillable = ['name', 'description', 'id_freelancer','picture_url'];

    // Relación con freelancer (si tienes tabla users o freelancers)
    public function freelancer()
    {
        return $this->belongsTo(User::class, 'id_freelancer');
    }
}

