<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Notification_Type extends Model
{
    use HasFactory,SoftDeletes;
    public function notification()
    {
        return $this->hasMany(Notification::class);
    }
    protected $fillable = [
        'notification_code',
        'notification_type_text',
        'entry_status',
        'is_active',
    ];
}
