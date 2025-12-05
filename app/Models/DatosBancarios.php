<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DatosBancarios extends Model
{
    use HasFactory;

    protected $table = 'datos_bancarios';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'count_number',
        'interbank_clabe',
        'url_count_state',
        'id_freelancer',
        'id_bank'
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

    public function freelancer()
    {
        return $this->belongsTo(Freelancer::class, 'id_freelancer', 'id');
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'id_bank', 'id');
    }
}
