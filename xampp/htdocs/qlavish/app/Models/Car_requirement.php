<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Car_requirement extends Model
{
    use HasFactory,SoftDeletes;
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
    public function dealdetail()
    {
        return $this->hasMany(DealDetail::class);
    }
    protected $fillable = [
        'minimum_age',
        'insurrance_deposit_value',
        'driving_license',
        'valid_passport',
        'driving_license_front',
        'driving_license_back',
        'passport',
    ];
}
