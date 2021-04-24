<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Name extends Model
{
	//Mass assigned
	protected $guarded = ['id'];

	public function scopeLastNames($query, $count)
	{
		return $query->orderBy('created_at', 'desc')->take($count)->get();
	}
}
