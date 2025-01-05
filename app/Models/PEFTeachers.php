<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Webmozart\Assert\Tests\StaticAnalysis\null;

class PEFTeachers extends Model
{
    use HasFactory;

    protected $connection= 'pef';

    protected $table = 'imis_pef.teachers_api';
    protected $guarded = [];

    public $timestamps = false;

}
