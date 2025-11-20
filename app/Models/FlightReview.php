<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'flight_id', 'user_id', 'rating', 'comment'
    ];

    public $incrementing = false;
    protected $keyType = 'string';

    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

