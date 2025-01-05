<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Webmozart\Assert\Tests\StaticAnalysis\null;

class PEFStudents extends Model
{
    use HasFactory;

    protected $connection= 'pef';

    protected $table = 'imis_pef.students_api';
    protected $guarded = [];

    public $timestamps = false;

}
