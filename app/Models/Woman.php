<?php

namespace App\Models;

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
        return $this->morphToMany('App\Models\Category', 'categoryable');
    }

    // Mother
    public function mother()
    {
        return $this->belongsTo(self::class, 'mother_id');
    }

    // Father
    public function father()
    {
        return $this->belongsTo('App\Models\Man', 'father_id');
    }

    // Baldary
    public function uuldary()
    {
        return $this->hasMany('App\Models\Man', 'mother_id');
    }

    // Kyzdary
    public function kyzdary()
    {
        return $this->hasMany('App\Models\Woman', 'mother_id');
    }

    public function scopeLastWomen($query, $count)
    {
        return $query->orderBy('id', 'desc')->take($count)->get();
    }
}
