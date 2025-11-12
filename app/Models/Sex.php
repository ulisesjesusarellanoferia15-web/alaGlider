<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sex extends Model
{
    use HasFactory;

    protected $table = 'cat_user_sex'; // Nombre de la tabla
    protected $fillable = ['name']; // Campos que puedes llenar
}
