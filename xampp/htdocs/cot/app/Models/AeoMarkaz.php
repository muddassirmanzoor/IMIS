<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Aeo;
use App\Models\Markaz;


class AeoMarkaz extends Model
{


    protected $primaryKey = 'id';
    protected $table = 'aeo_markaz_assignments';

    protected $fillable = [
        "id",
        "markaz_id_Fk",
        "aeo_id_Fk",
        "status",
        "created_by_Fk",
        "updated_by_Fk"

    ];

    protected $hidden = [

    ];

    protected $dates = [
        "created_at",
        "updated_at",

    ];







}
