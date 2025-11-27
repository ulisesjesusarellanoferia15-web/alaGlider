<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class UserBilling extends Model
{
    use HasFactory;

    protected $table = 'users_billing';
    protected $primaryKey = 'id';
    public $incrementing = false; 
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'type_person',
        'business_name',
        'tradename',
        'rfc',
        'url_rfc',
        'street',
        'inner_number',
        'outdoor_number',
        'suburb',
        'url_acta_constitutiva',
        'pc',
        'observations',
        'user_id',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }
}
