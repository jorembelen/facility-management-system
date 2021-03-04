<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class JobOrder extends Model
{
    use HasFactory;
    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'occupant_id',
        'building_id',
        'job_type',
        'job_category',
        'notes',
        'status',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'job_orders', 'length' => 8, 'prefix' =>'SDR-']);
        });
    }

    public function occupant()
    {
        return $this->belongsTo(Occupant::class);
    }
    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    public function appointment()
    {
        return $this->hasMany(Appointment::class);
    }
}
