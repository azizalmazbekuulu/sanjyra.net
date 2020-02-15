<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Name extends Model
{
    //Mass assigned
    protected $fillable = ['name', 'slug', 'published', 'description_short', 'description', 'created_by', 'modified_by'];

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
