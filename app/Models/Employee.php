<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'badge',
        'designation',
        'mobile',
    ];

    public function appointment()
    {
        return $this->hasMany(Appointment::class);
    }
    
}
