<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Webmozart\Assert\Tests\StaticAnalysis\null;

class LNFBDLearners extends Model
{
    use HasFactory;

    protected $connection= 'lnfbd';

    protected $table = 'lnfbd.learner_api';
    protected $guarded = [];

    public $timestamps = false;

//    public function setIdAttribute($value)
//    {
//        $this->attributes['lnfbd_id'] = $value;
//    }
}
