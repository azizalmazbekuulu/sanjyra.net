<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Man extends Model
{
    //Mass assigned
    protected $fillable = ['name', 'father_id', 'level', 'kanchanchy_bala', 'mother_id', 'mother_name', 'bala_sany', 'uruusu', 'info'];

    //Polymorphic relation with categories
    public function categories()
    {
        return $this->morphToMany('App\Category', 'categoryable');
    }

    //Get children category
    public function children()
    {
        return $this->hasMany(self::class, 'father_id');
    }

    //Get children category
    public function father()
    {
        return $this->belongsTo(self::class, 'father_id');
    }

    public function scopeLastMen($query, $count)
    {
        return $query->orderBy('id', 'desc')->take($count)->get();
    }
}
