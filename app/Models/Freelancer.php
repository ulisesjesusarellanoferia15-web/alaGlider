<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Freelancer extends Model
{
    use HasFactory;

    protected $table = 'freelancers';
    protected $primaryKey = 'id';
    public $incrementing = false; // UUID
    protected $keyType = 'string';

    protected $fillable = [
        // Campos existentes
        'name',
        'lastname',
        'picture_profile',

        // Campos nuevos del registro Glider paso 2
        'id',
        'description',
        'since_experience',
        'level_education',
        'is_titled',
        'url_vc',
        'url_title',
        'url_professional_license',
        'type_briefcase',
        'type_user_suscribe',
        'type_freelancer',
        'register_sat',
        'projects',
        'facebook',
        'instagram',
        'youtube',
        'other_red',
        'reasons_declined',
        'spammer',
        'vacation',
        'acepted',
        'id_user',
    ];

    // Relación existente (la dejo intacta)
    public function user()
    {
        return $this->belongsTo(CardsProfile::class, 'id_user', 'id');
    }

    // Relación nueva (para los skills)
    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'freelancers_has_skills', 'id_freelancer', 'id_skills')
            ->withPivot('id')
            ->withTimestamps();
    
    }
    
    // Relación nueva (para los datos bancarios)
    public function bankData()
    {
        return $this->hasOne(DatosBancarios::class, 'id_freelancer', 'id');
    }

}
