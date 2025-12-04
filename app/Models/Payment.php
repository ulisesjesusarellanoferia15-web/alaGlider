<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Payment extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id','flight_id','package_id','user_id','provider','provider_payment_id',
        'amount','currency','status','meta'
    ];
    protected $casts = [
        'meta' => 'array',
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            if (!$model->id) $model->id = (string) Str::uuid();
        });
    }

    public function flight() { return $this->belongsTo(\App\Models\Flight::class, 'flight_id'); }
    public function package() { return $this->belongsTo(\App\Models\PackagesProducts::class, 'package_id'); }
    public function user() { return $this->belongsTo(\App\Models\User::class, 'user_id'); }
}
