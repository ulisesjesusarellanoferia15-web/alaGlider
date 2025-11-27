<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreelancerHasSkill extends Model
{
    use HasFactory;

    protected $table = 'freelancers_has_skills';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'id_freelancer',
        'id_skills',
    ];

    public function freelancer()
    {
        return $this->belongsTo(Freelancer::class, 'id_freelancer');
    }

    public function skill()
    {
        return $this->belongsTo(Skill::class, 'id_skills');
    }
}
