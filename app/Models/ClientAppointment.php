<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Model;

class ClientAppointment extends Model
{
    use HasFactory;
    public $incrementing = false;

    protected $fillable = [
        'id',
        'user_id',
        'building_id',
        'badge',
        'work_category_id',
        'job_description',
        'schedule_time',
        'job_description',
        'images',
        'date',
        'documents',
    ];

    public function category()
    {
        return $this->belongsTo(WorkCategory::class, 'work_category_id');
    }
    public function client()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function building()
    {
        return $this->belongsTo(Building::class, 'building_id');
    }
    public function occupancy()
    {
        return $this->belongsTo(Occupancy::class, 'occupant_id');
    }

    // public function building()
    // {
    //     return $this->belongsTo(Building::class);
    // }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'client_appointments', 'length' => 11, 'prefix' =>'SAW-']);
        });
    }

}
