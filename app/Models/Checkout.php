<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $dates = [
        'released_date',
    ];

    protected $fillable = [
        'user_id',
        'tenant_id',
        'building_id',
        'checkin_date',
        'released_date',
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
