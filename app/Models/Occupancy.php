<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Occupancy extends Model
{
    use HasFactory;

    protected $dates = [
        'released_date',
        'issued_date'
    ];

    protected $fillable = [
        'user_id',
        'badge',
        'building_id',
        'released_date',
        'issued_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    

}
