<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dashboard extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'shippingType',
        'vehicleType',
        'dateEntry',
        'dateExit',
        'duration',
        'license_plate', // เพิ่มคอลัมน์ license_plate
    ];

    protected $casts = [
        'dateEntry' => 'datetime',
        'dateExit' => 'datetime',
    ];

    public function isOverdue()
    {
        return $this->dateExit < now();
    }

    // public function carInfo()
    // {
    //     return $this->belongsTo(CarInfo::class, 'license_plate', 'license_plate'); // เชื่อมโยงกับ CarInfo
    // }
}
