<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;

class Category extends Model
{
    use Searchable;
    
    //Mass assigned
    protected $guarded = ['id'];
    
    //Mutators
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug( mb_substr($this->title, 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-');
    }

    //Get children category
    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    //Polymorphic relation with articles
    public function articles()
    {
        return $this->morphedByMany('App\Article', 'categoryable');
    }

    //Polymorphic relation with men
    public function men()
    {
        return $this->morphedByMany('App\Man', 'categoryable');
    }

    //Polymorphic relation with women
    public function women()
    {
        return $this->morphedByMany('App\Woman', 'categoryable');
    }

    public function scopeLastCategories($query, $count)
    {
        return $query->orderBy('created_at', 'desc')->take($count)->get();
    }
}
