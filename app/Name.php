<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
// use Laravel\Scout\Searchable;

class Name extends Model
{
    // use Searchable;
    
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
