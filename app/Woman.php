<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;

class Woman extends Model
{
    // use Searchable;

    //Mass assigned
    protected $guarded = ['id'];

    //Polymorphic relation with categories
    public function categories()
    {
        return $this->morphToMany('App\Category', 'categoryable');
    }

    // Mother
    public function mother()
    {
        return $this->belongsTo(self::class, 'mother_id');
    }

    // Baldary
    public function uuldary()
    {
        return $this->hasMany('App\Man', 'mother_id');
    }

    public function scopeLastWomen($query, $count)
    {
        return $query->orderBy('id', 'desc')->take($count)->get();
    }
}
