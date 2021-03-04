<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'work_category_id',
        'date',
        'time',
        'slot',
    ];

    public function category()
    {
        return $this->belongsTo(WorkCategory::class, 'work_category_id');
    }

}
