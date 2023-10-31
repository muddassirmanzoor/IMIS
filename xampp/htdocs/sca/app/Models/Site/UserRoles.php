<?php

namespace App\Models\Site;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserRoles extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table="fms_user_roles";
    protected $fillable = [
        'role_id', 'user_id', 'is_active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scopeActive($query)
    {
        return $query->where(['is_deleted'=> 0]);
    }
    
    public function user()
    {
        return $this->belongsTo('App\Models\Site\User','user_id')->active();
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Site\Roles','role_id')->active();
    }


}
