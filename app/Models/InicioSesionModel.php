<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class InicioSesionModel extends Model
{
    use HasFactory;

    protected $table = 'inicio_sesion';
    protected $primaryKey = 'id';
    public $incrementing = false; // porque será UUID
    protected $keyType = 'string';

    protected $fillable = [
        'email',
        'username',
        'password',
        'remember_token',
        'token_confirmacion',
        'token_confirmacion_movil',
        'confirmed',
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

    public function user()
    {
        return $this->hasOne(UserModel::class, 'id_inicio_sesion', 'id');
    }
}
