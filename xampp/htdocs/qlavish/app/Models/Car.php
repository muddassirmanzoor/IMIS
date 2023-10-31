<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Car extends Model
{
    use HasFactory,SoftDeletes;
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class,'brand_id','id');
    }
    public function car_scratch()
    {
        return $this->hasMany(Car_Scratch::class);
    }
    public function car_discount_ad()
    {
        return $this->hasMany(CarDiscountAd::class);
    }
    public function payment_mode()
    {
        return $this->hasMany(Payment_Mode::class);
    }
    public function car_scratch_status()
    {
        return $this->hasMany(Car_Scratch_Status::class);
    }
    public function DealDetail()
    {
        return $this->hasMany(DealDetail::class);
    }
    public function car_discount()
    {
        return $this->hasMany(Car_discount::class);
    }
    public function gift_discount_ad()
    {
        return $this->hasMany(Gift_discount_ad::class);
    }
    public function car_availibility()
    {
        return $this->hasMany(Car_availibility::class);
    }
    public function notification()
    {
        return $this->hasMany(Notification::class);
    }
    public function car_extra()
    {
        return $this->hasMany(Car_extra::class);
    }
    public function car_requirement()
    {
        return $this->hasMany(Car_requirement::class);
    }
    public function car_delivery()
    {
        return $this->hasMany(Car_delivery::class);
    }
    protected $fillable = [
        'car_image_1',
        'car_thumbnail_1',
        'car_image_2',
        'car_thumbnail_2',
        'car_image_3',
        'car_thumbnail_3',
        'car_image_4',
        'car_thumbnail_4',
        'car_image_5',
        'car_thumbnail_5',
        'car_image_6',
        'car_thumbnail_6',
        'scratch_message',
        'is_active',
        'car_entry_date',
        'car_code',
        'car_name',
        'car_year',
        'car_gear_box',
        'car_engine',
        'car_mileage_limit',
        'car_drive',
        'car_transmission',
        'car_top_speed',
        'car_pessenger',
        'car_price_daily',
        'car_price_weekly',
        'car_price_monthly',
        'car_insurranc',
        'car_pickup_location',
        'car_pickup_gps',
    ];
}
