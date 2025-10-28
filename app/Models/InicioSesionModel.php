<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Para autenticación
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class InicioSesionModel extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'inicio_sesion';
    protected $primaryKey = 'id';
    public $incrementing = false;
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

    protected $hidden = [
        'password',
        'remember_token',
        'token_confirmacion',
        'token_confirmacion_movil',
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

    // Relación con la tabla users
    public function user()
    {
        return $this->hasOne(UserModel::class, 'id_inicio_sesion', 'id');
    }
}
