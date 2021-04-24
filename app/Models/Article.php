<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    // use Searchable;
    
    //Mass assigned
    protected $guarded = ['id'];
    
    //Mutators
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($this->title . '-');
    }

    //Polymorphic relation with categories
    public function categories()
    {
        return $this->morphToMany('App\Models\Category', 'categoryable');
    }

    public function scopeLastArticles($query, $count)
    {
        return $query->orderBy('created_at', 'desc')->take($count)->get();
    }
}
