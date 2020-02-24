<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Woman extends Model
{
    //Mass assigned
    protected $guarded = ['id'];

    //Polymorphic relation with categories
    public function categories()
    {
        return $this->morphToMany('App\Category', 'categoryable');
    }

    // Kyzdary
    public function mother()
    {
        return $this->belongsTo(self::class, 'mother_id');
    }

    public function scopeLastWomen($query, $count)
    {
        return $query->orderBy('id', 'desc')->take($count)->get();
    }
}
