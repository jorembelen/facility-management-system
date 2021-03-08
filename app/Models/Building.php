<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;
    public $incrementing = false;
    
    protected $fillable = [
                'user_id',
                'tenant_id',
                'rc_no',
                'ifc_no',
                'flat_no',
                'villa_no',
                'lot_no',
                'block_no',
                'street',
                'description',
                'status',
    ];

    public function tenant()
    {
        return $this->belongsTo(User::class, 'tenant_id');
    }

    public function checkout()
    {
        return $this->hasOne(Checkout::class, 'building_id');
    }

    public function jobOrder()
    {
        return $this->hasMany(JobOrder::class);
    }

    public function occupancy()
    {
        return $this->hasMany(Occupancy::class);
    }

    public function appointments()
    {
        return $this->hasMany(ClientAppointment::class, 'building_id');
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'buildings', 'length' => 8, 'prefix' =>'SDR-']);
        });
    }
    
}
