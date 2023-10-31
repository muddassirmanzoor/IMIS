<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolContact extends Model
{

    protected $table = 'school_contacts';

    protected $fillable = ['name', 'designation', 'email', 'contact_number', 'school_id_Fk'];

    public $timestamps = true;

}