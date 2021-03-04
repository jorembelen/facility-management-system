<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Occupant extends Model
{
    use HasFactory;

    protected $fillable = [
        'badge',
        'name',
        'status',
        'status_desc',
        'cost_center',
        'mobile',
        'email',
    ];

    public function occupancy()
    {
        return $this->hasMany(Occupancy::class);
    }

    public function building()
    {
        return $this->hasMany(Building::class);
    }

    public function building_occupant()
    {
        return $this->hasMany(JobOrder::class);
    }

}
