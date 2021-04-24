<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Man extends Model
{
	//Mass assigned
	protected $guarded = ['id'];

	//Polymorphic relation with categories
	public function categories()
	{
		return $this->morphToMany('App\Models\Category', 'categoryable');
	}

	//Get children 
	public function children()
	{
		return $this->hasMany(self::class, 'father_id');
	}

	// Father
	public function father()
	{
		return $this->belongsTo(self::class, 'father_id');
	}

	// Mother
	public function mother()
	{
		return $this->belongsTo('App\Models\Woman', 'mother_id');
	}

	// Kyzdary
	public function kyzdary()
	{
		return $this->hasMany('App\Models\Woman', 'father_id');
	}

	public function scopeLastMen($query, $count)
	{
		return $query->orderBy('id', 'desc')->take($count)->get();
	}
}
