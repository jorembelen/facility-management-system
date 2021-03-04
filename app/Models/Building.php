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
                'building_code',
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

    public function buildingUser()
    {
        return $this->belongsTo(Occupant::class);
    }

    public function jobOrder()
    {
        return $this->hasMany(JobOrder::class);
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'buildings', 'length' => 7, 'prefix' =>'SDR-']);
        });
    }
    
}
