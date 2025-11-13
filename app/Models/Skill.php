<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $table = 'skills';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'name',
        'active',
        'id_category'
    ];

    public function freelancers()
    {
        return $this->belongsToMany(
            Freelancer::class,
            'freelancers_has_skills',
            'id_skills',
            'id_freelancer'
        );
    }
}
