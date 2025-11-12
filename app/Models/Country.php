<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public $incrementing = false; // No es autoincremental
    protected $keyType = 'string'; // El ID es de tipo string (UUID)

    protected $table = 'countries'; // Nombre de la tabla
    protected $fillable = ['name']; // Campos que puedes llenar
}
