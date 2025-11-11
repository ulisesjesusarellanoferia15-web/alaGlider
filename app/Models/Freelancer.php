<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Freelancer extends Model
{
    protected $table = 'freelancers';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'name',
        'lastname',
        'picture_profile'
    ];

    public function user()
    {
        return $this->belongsTo(CardsProfile::class, 'id_user', 'id');
    }
}
