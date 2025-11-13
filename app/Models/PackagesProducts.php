<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackagesProducts extends Model
{
    protected $table = 'packages_products';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'description',
        'package_type',
        'delivery_days',
        'revisions',
        'cost',
        'id_flights',
    ];
}
