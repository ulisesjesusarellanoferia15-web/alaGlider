<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CardsProfile extends Model
{
    protected $table = 'users'; // apunta a la tabla correcta
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id', 'name', 'lastname', 'picture_profile',
    ];
}
