<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Occupancy extends Model
{
    use HasFactory;

    protected $dates = [
        'issued_date'
    ];

    protected $fillable = [
        'user_id',
        'tenant_id',
        'building_id',
        'issued_date',
        'remarks',
    ];

    public function tenant()
    {
        return $this->belongsTo(User::class, 'tenant_id');
    }

    public function building()
    {
        return $this->belongsTo(Building::class, 'building_id');
    }

    

}
