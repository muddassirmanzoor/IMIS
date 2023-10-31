<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UpdateContactInformationRequest extends Model
{

	public $fillable = [
		'user_id',
		'district_id',
		'cnic',
		'cell_number',
		'email',
		'ceo_comments',
		'director_comments',
		'status',
		'created_by',
		'updated_by'
	];

	function user()
	{
		return $this->belongsTo(User::class);
	}
}
