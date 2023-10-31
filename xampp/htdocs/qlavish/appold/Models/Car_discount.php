<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Car_discount extends Model
{
    use HasFactory,SoftDeletes;
    public function admin()
    {

        return $this->belongsTo(Admin::class,'admin_id','id');
    }
    public function car()
    {
        return $this->belongsTo(Car::class,'car_id','id');
    }
    protected $fillable = [
        'car_discount_value',
        'car_discount_title',
        'car_discount_text',
        'car_discount_image',
        'car_discount_thumbnail',
        'date_valid',
    ];
}
