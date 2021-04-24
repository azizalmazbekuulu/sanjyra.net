<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    // use Searchable;
    
    //Mass assigned
    protected $guarded = ['id'];
    
    //Mutators
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($this->title . "-");
    }

    //Get children category
    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    //Polymorphic relation with articles
    public function articles()
    {
        return $this->morphedByMany('App\Models\Article', 'categoryable');
    }

    //Polymorphic relation with men
    public function men()
    {
        return $this->morphedByMany('App\Models\Man', 'categoryable');
    }

    //Polymorphic relation with uruu
    public function uruu()
    {
        return $this->morphedByMany('AApp\Modelspp\Uruu', 'categoryable');
    }

    //Polymorphic relation with women
    public function women()
    {
        return $this->morphedByMany('App\Models\Woman', 'categoryable');
    }

    //Polymorphic relation with literature
    public function literature()
    {
        return $this->morphedByMany('App\Models\Literature', 'categoryable');
    }

    public function scopeLastCategories($query, $count)
    {
        return $query->orderBy('created_at', 'desc')->take($count)->get();
    }
}
