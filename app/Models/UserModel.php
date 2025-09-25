<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $primaryKey = 'id';
    public $incrementing = false; 
    protected $keyType = 'string';

    protected $fillable = [
        'name',
        'lastname',
        'picture_profile',
        'id_country',
        'state',
        'delegation',
        'sex_id',
        'delivery_date',
        'phone',
        'identificate',
        'provider',
        'social_id',
        'profile_id',
        'id_inicio_sesion',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (!$model->id) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    public function inicioSesion()
    {
        return $this->belongsTo(InicioSesionModel::class, 'id_inicio_sesion', 'id');
    }
}
