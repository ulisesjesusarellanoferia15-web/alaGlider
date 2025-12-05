<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    // Nombre de la tabla (opcional si sigues la convención)
    protected $table = 'banks';

    // Clave primaria
    protected $primaryKey = 'id';
    public $incrementing = false; // usas UUIDs tipo char(36)
    protected $keyType = 'string';

    // Campos asignables
    protected $fillable = [
        'id',
        'name',
        'url_picture',
        'id_country',
        'active',
    ];

    // Si quieres que Eloquent maneje created_at/updated_at deja true (por defecto true)
    public $timestamps = true;
   
}
