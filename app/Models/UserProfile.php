<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $table = 'cat_user_profile';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['name'];
}
