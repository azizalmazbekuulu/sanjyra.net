<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Name extends Model
{
    //Mass assigned
    protected $guarded = ['id'];

    //Mutators
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug( $this->name , "-");
    }

    public function scopeLastNames($query, $count)
    {
        return $query->orderBy('created_at', 'desc')->take($count)->get();
    }
}
