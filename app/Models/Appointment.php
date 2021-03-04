<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'job_order_id',
        'employee_id',
        'date',
        'time',
        'remarks',
        'background_color',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function job_order()
    {
        return $this->belongsTo(JobOrder::class);
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'client_appointments', 'length' => 9, 'prefix' =>'SAW-']);
        });
    }

}
