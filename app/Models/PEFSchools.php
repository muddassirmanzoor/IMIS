<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Webmozart\Assert\Tests\StaticAnalysis\null;

class PEFSchools extends Model
{
    use HasFactory;

    protected $connection= 'pef';

    protected $table = 'imis_pef.schools_api';
    protected $guarded = [];

    public $timestamps = false;

    protected function latitutde(): Attribute
    {
        return Attribute::make(
            set: fn ( $value) => ( $value == null  ? '0' : $value),
        );
    }
    protected function longitude(): Attribute
    {
        return Attribute::make(
            set: fn ( $value) => ( $value == null  ? '0' : $value),
        );
    }
}
