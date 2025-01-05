<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Webmozart\Assert\Tests\StaticAnalysis\null;

class LNFBDSchools extends Model
{
    use HasFactory;

    protected $connection= 'lnfbd';

    protected $table = 'lnfbd.schools_api';
    protected $guarded = [];

    public $timestamps = false;


    protected function sessionStartDate(): Attribute
    {
        return Attribute::make(
            set: fn ( $value) => ($value == '0000-00-00' || $value == null  ? '1980-01-01' : $value),
        );
    }

    protected function schoolCreatedAt(): Attribute
    {
        return Attribute::make(
            set: fn ( $value) => ($value == '0000-00-00 00:00:00' || $value == null  ? '1980-01-01' : $value),
        );
    }

    protected function schoolDeletedAt(): Attribute
    {
        return Attribute::make(
            set: fn ( $value) => ($value == '0000-00-00 00:00:00' || $value == null  ? '1980-01-01' : $value),
        );
    }
}
