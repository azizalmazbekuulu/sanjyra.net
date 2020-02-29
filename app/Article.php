<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;

class Article extends Model
{
    use Searchable;
    
    //Mass assigned
    protected $guarded = ['id'];
    
    //Mutators
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug( mb_substr($this->title, 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-');
    }

    //Polymorphic relation with categories
    public function categories()
    {
        return $this->morphToMany('App\Category', 'categoryable');
    }

    public function scopeLastArticles($query, $count)
    {
        return $query->orderBy('created_at', 'desc')->take($count)->get();
    }
}
