<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Webmozart\Assert\Tests\StaticAnalysis\null;

class LNFBDTeachers extends Model
{
    use HasFactory;

    protected $connection= 'lnfbd';

    protected $table = 'lnfbd.teacher_api';
    protected $guarded = [];

    public $timestamps = false;

    protected function dojPrevious(): Attribute
    {
        return Attribute::make(
            set: fn ( $value) => ($value == '0000-00-00' ? null : null),
        );
    }
}
